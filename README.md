github link: https://github.com/Kida2211/blog-ai

Reflection Questions
1. How did the AI output change when you modified the tone or role in your prompt?
When I changed the tone (e.g., from friendly to professional), the AI adjusted its writing style accordingly. A friendly tone produced casual and conversational language, while a professional tone was more formal and structured. The informal tone included humor and relaxed phrasing, and the persuasive tone focused more on convincing the reader, often using rhetorical techniques. These changes made the AI's output feel context-aware and aligned with user intent, proving the importance of clear prompt engineering.

2. What would you improve about the API integration for a production app?
For a production app, I would:

-Add loading indicators while the API is processing

-Cache recent responses to reduce API costs

-Implement retry logic for transient API errors

-Store generated content in a database for future editing

-Add role-based access so only authenticated users can generate content

-Add unit and feature tests for service logic and controller behavior

3. What’s one thing you learned about Laravel that you hadn’t used before?
I learned how to create and use a service class in Laravel to isolate third-party API logic. This separation made the code more organized, reusable, and easier to test. I also became more familiar with Laravel’s built-in Http::withHeaders() helper and how to manage environment variables through config() for secure and flexible API access.

