---
name: quiz-me
description: Test the user's understanding of code changes in the current branch compared with the base branch. Use when the user wants a multiple-choice quiz about a branch diff, pull request, or local code changes. Generates focused questions about behavioural impact, integration points, risks, tests, and edge cases, then grades the user's answers and provides feedback.
---

# Quiz Me

Generate a multiple-choice quiz based on the differences between the current branch and the base branch to help the user verify their understanding of the code changes.

## Workflow

1. Inspect the branch diff.
2. Analyze meaningful changes using `references/DIFF-ANALYSIS.md`.
3. Generate questions using `references/QUESTION-RULES.md`.
4. Use `references/EXAMPLE-QUESTIONS.md` only as structural inspiration.
5. Ask each question one at a time.
6. Keep the answer key private until all questions have been answered.
7. Grade the quiz and provide feedback.

## Diff Discovery

Compare the current branch against the base branch.

Prefer:

```bash
git diff --stat main...HEAD
git diff main...HEAD
git log --oneline main..HEAD
```

If `main` does not exist, try `master`.

If neither `main` nor `master` exists, ask the user which base branch to compare against.

If git access is unavailable, ask the user to provide the diff, pull request, or changed files.

Ignore generated files, lockfiles, formatting-only changes, vendor files, and unrelated churn unless they materially affect behaviour.

If the diff is very large, summarize the main changed areas first, then focus the quiz on the most behaviourally significant changes.

If there are no meaningful changes, explain that no useful quiz can be generated.

## Question Generation

Generate 2-5 questions depending on the scale and risk of the changes.

Use fewer questions for small or isolated diffs. Use more questions for larger diffs, cross-file changes, behavioural changes, or riskier logic.

Focus on:

- behavioural impact
- business logic
- validation
- security or permissions
- API or interface contracts
- error handling
- data flow
- integration with existing code
- edge cases
- regression risks
- test intent

Avoid basic questions such as asking only for function names, file names, line numbers, or superficial implementation details.

Each question must include 4 plausible answer options.

Randomize answer option order.

Ensure there is exactly one clearly correct answer.

Include relevant context or short code snippets where helpful.

Only ask questions based on the current branch diff. Do not ask about unrelated code or general programming concepts.

## Quiz Interaction

Ask one question at a time.

Wait for the user’s answer before asking the next question.

Do not reveal whether the answer is correct until the quiz is complete.

Do not reveal the answer key during the quiz.

## Passing

A quiz is considered passed only if the user answers all questions correctly.

If the user does not answer all questions correctly, encourage them to review the code changes before attempting another quiz.

Do not claim that quiz completion is cryptographically verified unless an external verification service is available.

## Feedback Format

Once the user has completed the quiz, provide feedback in this format:

```md
## Quiz Results: X/Y

### Question 1: [Question Text]
- Your Answer: [Selected Option]
- Correct Answer: [Correct Option]

[Relevant code snippet or explanation, especially if the user's answer is incorrect]

---
```

Repeat for each question.