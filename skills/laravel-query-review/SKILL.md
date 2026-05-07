---
name: laravel-query-review
description: Review Laravel database query performance, readability, and best practice in Eloquent, relationships, scopes, API resources, and DB facade/query-builder code. Use when the user asks to review or optimise Laravel queries, database performance, N+1 risks, indexing, pagination, or query behavior in a diff, PR, file, or specific query.
---

# Laravel Query Review

Review Laravel database query code and return actionable findings focused on performance, readability, and framework best practice. This skill is review-only by default: do not edit files unless the user explicitly asks you to fix, optimise, apply, or otherwise make changes.

## Workflow

1. Discover the target:
   - If the user names a file, query, PR, or specific scope, review that target.
   - Otherwise, review the current branch diff against the base branch.
2. Inspect changed Laravel query surfaces:
   - Eloquent builders, model relationships, scopes, casts/accessors/mutators that may query, controllers, actions, services, jobs, commands, policies, validation rules, API resources, exports, reports, and direct `DB` facade or query-builder calls.
   - Include changed migrations and schema files from the diff as context for indexes, relationships, and data shape.
   - Do not recommend editing existing migrations unless the user specifically asks. For existing schema changes, prefer new follow-up migrations when a fix is requested.
3. Load `references/LARAVEL-QUERY-CHECKLIST.md` and apply it to the changed behavior.
4. Inspect relevant tests as supporting context. Recommend query-count or regression tests only when the project already has a suitable pattern or the query risk is material.
5. Use official Laravel documentation when it materially supports a finding. Prefer docs matching the project's Laravel version when known.
6. Use Laravel Boost MCP only when necessary to validate an important assumption and only when you are absolutely certain the operation is read-only.
7. Produce priority-ranked findings using the output format below.

## Laravel Boost MCP Safety

Laravel Boost MCP validation is optional and must be conservative.

- Use it only when static analysis leaves an important query-performance assumption unresolved.
- Only perform read-only inspection, such as safe schema/index inspection, safe `SELECT`/`EXPLAIN` style checks, or read-only query observation.
- Do not run any operation that may insert, update, delete, truncate, alter schema, run migrations, seed data, dispatch jobs, process queues, trigger side effects, or call application code with possible mutation.
- If there is any uncertainty about whether an operation can mutate data, do not run it. Report the validation gap in `Residual Risk` instead.

## Review Standard

Focus on confirmed, actionable issues in Laravel query behavior. Treat generic SQL performance risks as in scope when they appear through Laravel Eloquent, relationships, scopes, query builder, or the `DB` facade.

Prioritise:

- avoiding N+1 queries and accidental lazy loading
- reducing unnecessary round trips, row scans, memory use, and loaded columns
- choosing appropriate aggregates, existence checks, eager loading, joins, subqueries, pagination, chunking, and streaming APIs
- identifying cautious index candidates from visible query patterns and schema context
- preserving tenant, authorization, global-scope, soft-delete, and relationship constraints when optimizing
- keeping query intent readable and maintainable

Only report findings that are grounded in the inspected code. If a performance concern depends on unknown production cardinality, query plans, or data distribution, phrase it cautiously and include the uncertainty in the finding or `Residual Risk`.

## Priorities

- `P0`: Query behavior that can clearly take down production, cause severe data exposure, or create critical data-loss or locking risk.
- `P1`: Very likely production-impacting query behavior, such as obvious N+1s on list endpoints, unbounded loads on large tables, nested per-row queries, or missing pagination on high-volume user-facing paths.
- `P2`: Meaningful inefficiency that should be fixed before merge, such as avoidable per-row aggregates, missing eager loads in common paths, inefficient relationship checks, or a likely missing index for a new hot-path query.
- `P3`: Readability, maintainability, or best-practice issues that affect confidence, such as unclear `orWhere` grouping, `get()->count()` instead of `count()`, excessive selected columns in modest contexts, or query logic that should follow an existing local scope pattern.

## Output Format

If findings exist:

```md
## Findings

[P1] Short finding title
File: path/to/file.ext:123
Issue: Describe the concrete query problem.
Impact: Explain the performance, scalability, readability, or data-boundary failure mode.
Recommendation: Describe the smallest practical fix.
Source: Include only when official Laravel documentation materially supports the finding.

## Checks Run

- `command`
- Laravel Boost MCP: read-only check performed
- Not run: reason

## Residual Risk

- Anything material that could not be validated, such as production cardinality, query plans, or unavailable schema context.
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

Omit empty sections except `Findings`. Do not include praise, approval/request-changes language, broad summaries, or speculative optimization ideas that are not tied to the reviewed code.
