<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AiQuestionController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:50',
            'bookName' => 'nullable|string',
            'grade' => 'required',
            'field' => 'nullable|string',
            'chapter' => 'nullable|string',
            'count' => 'required|integer|min:1|max:30',
        ]);

        $text = $request->input('text');
        $bookName = $request->input('bookName', '');
        $grade = $request->input('grade');
        $field = $request->input('field', '');
        $chapter = $request->input('chapter', 'همه');
        $count = (int) $request->input('count', 10);

        // کوتاه کردن متن برای جلوگیری از overflow
        if (mb_strlen($text) > 12000) {
            $text = mb_substr($text, 0, 12000)."\n\n[... ادامه متن حذف شد ...]";
        }

        $fieldPart = $field ? " رشته {$field}" : '';

        $prompt = $text."\n\n".
"این متن کتاب «{$bookName}» پایه {$grade}{$fieldPart} ایران است.
از فصل/فصل‌های {$chapter} دقیقاً {$count} سوال تولید کن.
سوالات را به ترتیب انواع زیر بساز (به تعداد تقریبی مساوی از هر نوع):
1. جواب کوتاه (type: text)
2. تشریحی (type: textarea)
3. صحیح و غلط (type: radio با دو گزینه درست/غلط)
4. چهارگزینه‌ای (type: radio با ۴ گزینه)

فقط و فقط یک آبجکت JSON معتبر برگردان. هیچ توضیح، مارک‌داون یا متن اضافه ننویس.
فرمت دقیق:

{
  \"questions\": [
    {
      \"id\": \"q1\",
      \"type\": \"text\",
      \"label\": \"متن سوال کوتاه اینجا\",
      \"name\": \"q1\",
      \"placeholder\": \"جواب کوتاه\",
      \"required\": true,
      \"className\": \"\",
      \"validation\": {\"minLength\": \"\", \"maxLength\": \"\", \"pattern\": \"\"}
    }
  ]
}";

        $apiKey = env('API_KEY');
        $baseUrl = rtrim(env('AI_BASE_URL', 'https://api.airforce/v1'), '/');
        $model = env('AI_MODEL', 'mistral-medium-3.5');

        if (! $apiKey) {
            return response()->json(['error' => 'API_KEY در .env تنظیم نشده'], 500);
        }

        try {
            $response = Http::timeout(90)->withoutVerifying()
                ->withHeaders([
                    'Authorization' => 'Bearer '.$apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post($baseUrl.'/chat/completions', [
                    'model' => $model,
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 4096,
                ]);

            if (! $response->successful()) {
                Log::error('AI API error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return response()->json([
                    'error' => 'خطای API: '.$response->status(),
                    'detail' => mb_substr($response->body(), 0, 300),
                ], 502);
            }

            $content = $response->json('choices.0.message.content');

            if (! $content) {
                return response()->json(['error' => 'پاسخ خالی از AI'], 502);
            }

            // استخراج JSON
            $cleaned = trim($content);
            if (preg_match('/```(?:json)?\s*([\s\S]*?)```/i', $cleaned, $m)) {
                $cleaned = trim($m[1]);
            }
            $start = strpos($cleaned, '{');
            $end = strrpos($cleaned, '}');
            if ($start === false || $end === false || $end <= $start) {
                return response()->json([
                    'error' => 'JSON در پاسخ پیدا نشد',
                    'raw' => mb_substr($content, 0, 500),
                ], 502);
            }

            $parsed = json_decode(substr($cleaned, $start, $end - $start + 1), true);

            if (! $parsed || empty($parsed['questions'])) {
                return response()->json([
                    'error' => 'ساختار JSON نامعتبر',
                    'raw' => mb_substr($content, 0, 500),
                ], 502);
            }

            return response()->json([
                'success' => true,
                'questions' => $parsed['questions'],
            ]);

        } catch (\Exception $e) {
            Log::error('AI generate exception: '.$e->getMessage());

            return response()->json([
                'error' => 'خطای سرور: '.$e->getMessage(),
            ], 500);
        }
        $maxAttempts = 3;
        $attempt = 0;
        $response = null;

        while ($attempt < $maxAttempts) {
            $attempt++;

            $http = Http::timeout(90)
                ->withHeaders([
                    'Authorization' => 'Bearer '.$apiKey,
                    'Content-Type' => 'application/json',
                ]);

            if (app()->environment('local')) {
                $http = $http->withoutVerifying();
            }

            $response = $http->post($baseUrl.'/chat/completions', [
                'model' => $model,
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'temperature' => 0.7,
                'max_tokens' => 4096,
            ]);

            // اگر rate limit نبود، خارج شو
            if ($response->status() !== 429) {
                break;
            }

            // صبر قبل از تلاش بعدی
            $wait = 5 * $attempt; // 5، 10، 15 ثانیه
            Log::warning("AI rate limit 429 — تلاش {$attempt}، صبر {$wait} ثانیه");
            sleep($wait);
        }

        if (! $response || $response->status() === 429) {
            return response()->json([
                'error' => 'محدودیت نرخ API. حدود ۱–۲ دقیقه صبر کن و دوباره تلاش کن.',
                'detail' => $response ? mb_substr($response->body(), 0, 300) : null,
            ], 429);
        }
        
    }
}
