---
name: pr-review
description: Conduct a complete chat-only pull request review for a provided GitHub PR, PR URL, or local branch diff. Use when the user asks to review a PR, review current branch changes before merge, find code review findings, check PR correctness, assess tests/security/style, or perform a priority-ordered review without publishing comments.
---

# PR Review

Review a PR or branch diff and return only actionable findings in priority order. Do not publish comments, approve, request changes, resolve threads, merge, or perform any GitHub mutation.

## Workflow

1. Discover the review target using `references/DIFF-DISCOVERY.md`.
2. If the diff is too large for a complete review, summarize changed areas and ask the user to narrow scope before continuing.
3. Inspect all changed files and enough surrounding code to validate behavior.
4. Load `references/REVIEW-CHECKLIST.md` and apply it to the changed behavior.
5. If PHP or Laravel is present, also load `references/PHP-LARAVEL-CHECKLIST.md`.
6. Inspect relevant tests and, when practical, run targeted checks using `references/COMMANDS.md`.
7. Use web access only when the diff raises dependency, security, compatibility, or framework/API correctness questions that local context cannot answer.
8. Produce Markdown findings using the output format below.

## Review Standard

A complete review means inspecting the diff plus necessary context, not exhaustively reading the whole repository. Validate correctness, security, data behavior, API contracts, tests, dependency impact, PSR-12 for PHP, and consistency with the existing codebase.

Only report confirmed, actionable issues. Do not manufacture findings. Put uncertainty in `Residual Risk` or `Open Questions`, not in `Findings`.

Read `references/FINDING-EXAMPLES.md` when calibrating severity or finding quality.

## Priorities

- `P0`: Critical correctness, security, or data-loss issue that must block immediately.
- `P1`: Serious bug, regression, authorization issue, or production-impacting behavior.
- `P2`: Meaningful issue that should be fixed before merge.
- `P3`: Minor maintainability, test, documentation, PSR-12, or consistency issue that affects review confidence.

Style and consistency findings must not appear above correctness, security, data, API, or test-risk findings unless a style/tooling issue creates direct functional risk.

## Output Format

If findings exist:

```md
## Findings

[P1] Short finding title
File: path/to/file.ext:123
Issue: Describe the concrete problem.
Impact: Explain the failure mode and why it matters.
Recommendation: Describe the smallest practical fix.
Source: Include only when external documentation/advisory evidence materially supports the finding.

## Checks Run

- `command`
- Not run: reason

## Residual Risk

- Anything material that was not verified.
```

If no findings exist:

```md
## Findings

No findings.

## Checks Run

- `command`
- Not run: reason

## Residual Risk

- Anything material that was not verified.
```

Omit empty sections except `Findings`. Do not include praise, approval/request-changes language, broad summaries, or low-value observations.
