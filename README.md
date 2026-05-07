# Codebased Skills

Internal skills created to assist with code generation, review, and debugging.

## What's Included

### /quiz-me

A skill that quizzes you on the changes in your current branch, designed to help ensure you understand the code before raising a pull request.

### /pr-review

A skill that conducts complete chat-only PR or branch-diff reviews, listing actionable findings in priority order without publishing comments.

## Install

Install from GitHub with the generic Skills CLI:

```bash
npx skills@latest add langleyfoxall/skills
```

Install from a local checkout:

```bash
npx skills@latest add .
```

Install a specific skill:

```bash
npx skills@latest add langleyfoxall/skills --skill pr-review
```

List available skills without installing:

```bash
npx skills@latest add langleyfoxall/skills --list
```

## Local Development

For Claude Code local development, symlink every skill into `~/.claude/skills`:

```bash
./scripts/link-skills.sh
```
