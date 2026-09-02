import 'dotenv/config';   // این خط متغیرهای .env را لود می‌کند
import OpenAI from "openai";
async function ai(prompt){
    const client = new OpenAI({ baseURL: "https://api.airforce/v1", apiKey: process.env.API_KEY });
    const r = await client.chat.completions.create({
      model: "gemma-4-26b-a4b-it",
      messages: [{ role: "user", content: prompt }],
    });
    return r.choices[0].message.content

}
