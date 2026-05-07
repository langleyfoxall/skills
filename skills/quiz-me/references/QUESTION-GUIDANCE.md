# Question Rules

Use this reference when generating quiz questions from a branch diff.

## Goal

Generate questions that test whether the user understands the purpose, behaviour, risks, and integration impact of the code changes.

Do not generate questions that only test whether the user noticed superficial details.

## Prefer Questions About

Prioritize questions covering:

1. Behavioural changes
2. Business logic changes
3. Validation rules
4. Security-sensitive changes
5. API or interface contract changes
6. Error handling
7. Edge cases
8. State changes
9. Data flow
10. Integration between changed and existing code
11. Regression risks
12. Test intent

## Avoid Questions About

Avoid questions focused on:

- Exact function names, unless the name is semantically important
- Line numbers
- File names alone
- Import ordering
- Formatting
- Comments
- Variable renames with no behavioural change
- Generated files
- Lockfiles
- Snapshot churn
- General programming knowledge unrelated to the diff

## Question Quality

A good question should:

- Require understanding of the branch diff
- Be answerable from the changed code
- Focus on why the change matters
- Include enough context for the user to reason
- Have one clearly correct answer
- Have three plausible but incorrect distractors
- Avoid trick wording
- Avoid ambiguity
- Avoid revealing the answer through option length or wording

## Distractor Rules

Distractors should be plausible misunderstandings of the diff.

Good distractors may describe:

- Previous behaviour
- A nearby but incorrect component
- A partially correct but incomplete interpretation
- A likely regression misunderstanding
- A confused relationship between changed files

Bad distractors include:

- Obviously silly answers
- Answers unrelated to the codebase
- Answers that contradict the question context
- Multiple answers that could reasonably be correct
- Options like “all of the above” or “none of the above”

## Difficulty

Aim for moderate difficulty.

The quiz should verify understanding, not punish the user for not memorising implementation details.

Increase difficulty when the diff includes:

- Cross-file behaviour
- Subtle control flow
- Security or permissions logic
- Async behaviour
- Data migrations
- Error handling
- Test changes that imply intended behaviour

Decrease difficulty when the diff is small or isolated.

## Context

Each question should include a short description or code snippet when helpful.

Use snippets only when they clarify the question. Keep snippets short and relevant.

Do not include large blocks of code unless necessary.

## Answer Handling

Ask one question at a time.

Do not reveal the correct answer until the user has answered all questions.

Keep an internal answer key while the quiz is in progress.

After the quiz, explain incorrect answers with reference to the relevant changed behaviour.['p']