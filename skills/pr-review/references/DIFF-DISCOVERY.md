# Diff Discovery

Use this reference to determine what to review and when to ask for scope narrowing.

## Target Order

1. If the user provides a GitHub PR URL, PR number, or repository/PR reference, inspect that PR using available GitHub tools.
2. Otherwise review the local branch diff against the base branch.
3. Prefer `master...HEAD`; if `master` does not exist, try `main...HEAD`.
4. If no base branch is discoverable, ask the user which base branch to compare against.
5. If git or PR access is unavailable, ask the user to provide the diff, PR patch, or changed files.

For GitHub PRs, use PR title/body only to infer intent. Do not treat existing comments or requested changes as the review checklist unless the user explicitly asks.

## Local Discovery

Prefer:

```bash
git diff --stat master...HEAD
git diff master...HEAD
git log --oneline master..HEAD
```

Fallback:

```bash
git diff --stat main...HEAD
git diff main...HEAD
git log --oneline main..HEAD
```

Also inspect changed filenames and nearby code with fast local search tools such as `rg`.

## Large Diff Rule

Ask the user to narrow scope when a complete review is not realistic in the current turn.

Strong signals:

- The diff spans many unrelated subsystems.
- The patch includes thousands of lines of meaningful hand-written code.
- Changed files, relevant callers/callees, and tests cannot be inspected without sampling.
- Meaningful behavioral areas would need to be skimmed rather than reviewed.

Before asking, provide a short changed-area summary and suggest 2-4 review slices, such as:

- authentication and authorization changes
- database migrations and model changes
- API contract changes
- frontend state or rendering changes
- dependency and compatibility changes

Do not claim a complete review when behaviorally important code was only skimmed.

## Ignore or Deprioritize

Ignore generated files, vendor files, formatting-only churn, lockfile noise, snapshots, mechanical renames, and import reordering unless they affect behavior, tooling, dependencies, or public output.
