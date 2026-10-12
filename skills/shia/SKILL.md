---
name: shia
description: Deliver a confirmed code change from a clean default branch through focused implementation, review, commit, and push. Use when the user wants an end-to-end, concise delivery workflow.
---

# Shia

Move. Be concise, direct, and lightly energising. Use short, action-first updates: “Plan confirmed. Moving.” Do not role-play, claim to be Shia LaBeouf, or overuse motivational catchphrases.

## Intake and agreement

Before making any repository mutation, establish the work request and any exceptions. Use details the user has already provided; ask only for missing or ambiguous inputs, together in this form:

```text
Branch name:
User story:
Acceptance criteria:
Explicit exceptions (for example: do not pull, use the current branch, do not push):
```

- Require an explicit branch strategy before confirmation: create or use a named non-default branch, or explicitly authorise delivery on the default branch. If the user says to use the current branch, record its name; if it is the default branch, obtain explicit authorisation to work there. Otherwise, ask for a branch name.
- Treat a clear request with a verifiable intended outcome as the user story and acceptance criteria. Ask for a user story or acceptance criteria only when the request leaves material requirements unclear.
- Treat an explicit exception as changing only its relevant step; retain every other safeguard.
- If `grilling` is available, invoke it after intake only when unresolved decisions materially affect the story or criteria.
- If requirements, branch, and exceptions are clear, the user's direct instruction to proceed is confirmation. Otherwise, restate the agreed requirement, scope, acceptance criteria, branch, and exceptions in a compact checklist and wait for explicit confirmation.

## Prepare the branch

After requirement confirmation:

1. Inspect the working tree. If it is not clean, stop and ask the user how to proceed. Never stash, reset, revert, discard, overwrite, or carry local changes between branches without explicit confirmation.
2. Resolve the repository's remote default branch. Use `master` only when it is that branch. If it cannot be resolved, stop and ask.
3. Unless explicitly told otherwise, switch to the default branch if needed and update it with a fast-forward-only pull. Stop on divergence, conflicts, or pull failure; do not merge or rebase as a workaround.
4. Unless delivery on the default branch was explicitly authorised, create or switch to the confirmed named branch. Check whether its name already exists locally or on the remote. If it does, stop and obtain confirmation before checking it out. If it does not, create it from the updated default branch.

## Build the smallest thing

- If `ponytail` is available, use it to identify the smallest complete implementation. Otherwise apply the same standard yourself.
- Implement only the confirmed requirement. Make no unrelated cleanup or behaviour changes.
- Run the smallest relevant automated checks. Report unavailable, failing, or incomplete checks honestly. Do not commit or push a known failure unless the user explicitly accepts that risk.

## Review, commit, and deliver

1. Use `pr-review` if available. Otherwise inspect the full diff, acceptance criteria, relevant call paths, and test results yourself.
2. Fix clear, in-scope findings. For anything that expands scope or changes agreed behaviour, stop and ask. After fixes, rerun affected checks and review again.
3. Commit the completed work. Use one commit unless separately useful, logical commits genuinely improve the history. Keep every commit message short and imperative.
4. Push the branch without force-pushing. Set the upstream when needed. Stop and report any push failure; do not retry with destructive Git options.
5. Finish with the branch name, commit(s), checks run and their result, review result, push destination, and any residual risk. State that the branch is ready for the user to continue with the pull-request process; do not create, edit, or merge a pull request.

## Stop conditions

Stop and ask rather than guessing when the working tree is dirty, the default branch is unknown, the target branch already exists, a Git operation conflicts or diverges, acceptance criteria are unclear, review needs an out-of-scope change, or a test/push failure needs a risk decision.
