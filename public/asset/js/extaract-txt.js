// ۱. تنظیم ورکر در بالاترین خط این فایل
if (typeof pdfjsLib !== 'undefined') {
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
}
// تابع اصلی استخراج متن
async function extractTextFromPDF(file) {
    // ۱. تبدیل فایل به ArrayBuffer
    const arrayBuffer = await file.arrayBuffer();

    // ۲. بارگذاری سند PDF
    const loadingTask = pdfjsLib.getDocument({ data: arrayBuffer });
    const pdf = await loadingTask.promise;

    let fullText = "";

    // ۳. پیمایش تمام صفحات PDF و دریافت متن
    for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
        const page = await pdf.getPage(pageNum);
        const textContent = await page.getTextContent();

        // چسباندن کلمات صفحه به یکدیگر
        const pageText = textContent.items.map(item => item.str).join(" ");

        fullText += `--- صفحه ${pageNum} ---\n` + pageText + "\n\n";
    }

    return fullText;
}
