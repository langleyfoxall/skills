# Laravel Query Checklist

Use this checklist to review Laravel query code for performance, readability, and best practice. Apply the items that match the changed code; do not force every item into a finding.

## Diff And Context

- Default to the current diff unless the user requests a specific file, query, PR, or review target.
- Inspect surrounding model relationships, scopes, resources, policies, jobs, actions, services, commands, and tests needed to understand the changed query behavior.
- Include changed migrations and schema files from the diff for index and data-shape context.
- Inspect existing migrations/schema only as context. Do not recommend editing existing migrations unless the user explicitly asks.
- Check whether the project uses soft deletes, tenancy, global scopes, authorization filters, or local query conventions before suggesting query rewrites.

## Laravel Documentation

Use official Laravel documentation when it materially supports a finding. Prefer the docs version matching the project when known.

Relevant documentation areas commonly include:

- Eloquent relationships, relationship constraints, eager loading, lazy eager loading, and preventing lazy loading
- Eloquent collections, API resources, serialization, accessors, mutators, and casts
- Query builder filtering, joins, subqueries, raw expressions, ordering, aggregates, and existence checks
- Pagination, cursor pagination, chunking, lazy collections, and streaming large result sets
- Database query listening, query logging, transactions, locks, and query testing helpers when present
- Migrations, indexes, foreign keys, and schema definitions

Do not add a documentation citation where the inspected code alone proves the issue.

## N+1 And Lazy Loading

- Look for relationship property access inside loops, resources, serializers, notifications, policies, accessors, computed attributes, jobs, exports, and view models.
- Check whether list endpoints or collection resources eager load relationships used during serialization.
- Prefer `with`, `load`, `loadMissing`, `withCount`, `withSum`, `withExists`, or constrained eager loading when they match the access pattern.
- Flag per-row calls to `count()`, `exists()`, aggregates, or relationship queries when a batched aggregate or eager-loaded count would preserve behavior.
- Consider whether eager loading may overfetch large relationship graphs. Recommend constrained eager loading or aggregate helpers where appropriate.

## Query Shape And Data Volume

- Flag unbounded `get()`, `all()`, or collection materialization on paths that can touch large tables.
- Prefer pagination for user-facing lists and cursor pagination when stable ordered traversal over high-volume data is needed.
- Prefer `chunkById`, `lazyById`, `cursor`, or lazy collections for large background processing where behavior allows it.
- Flag unnecessary `select *` behavior when the code only needs a small subset of columns and the path is hot or high-volume.
- Prefer database aggregates such as `count`, `sum`, `avg`, `min`, and `max` over loading rows into memory to aggregate in PHP.
- Prefer `exists()` or `doesntExist()` for existence checks instead of `count() > 0` or loading records.

## Index And Schema Review

- Treat index recommendations as candidates unless the visible schema and query path clearly prove the need.
- Check existing schema context before suggesting a new index, including foreign keys and previous composite indexes.
- Prefer composite indexes that match query predicates in practical order: equality filters first, then range filters, then ordering/grouping columns when useful.
- Be cautious with low-cardinality columns, redundant indexes, and indexes that add write overhead without clear read benefit.
- Flag new filters, joins, ordering, grouping, or uniqueness checks on likely large tables when no supporting index is visible.
- When a fix is requested, prefer a new migration for index changes in an existing project rather than editing old migrations.

## Relationship And Builder Choices

- Compare `whereHas`, `whereRelation`, joins, subqueries, and relationship constraints based on readability, result shape, duplication risk, and index use.
- Ensure query rewrites preserve Eloquent behavior that matters, including global scopes, soft deletes, casts, model events, relationship constraints, and tenancy filters.
- Flag `orWhere` conditions that may escape intended grouping. Recommend explicit closure grouping when needed.
- Avoid replacing clear relationship queries with raw joins unless the performance gain or query shape justifies the added complexity.
- Check that joins do not duplicate parent rows unexpectedly or break pagination/count behavior.

## Raw SQL And DB Facade

- Raw SQL is acceptable when justified by performance, database features, reports, aggregates, complex joins, or window functions.
- Check all raw SQL for safe bindings. Flag interpolation of user-controlled values.
- Check whether raw SQL bypasses global scopes, soft deletes, tenant filters, authorization constraints, or established model scopes.
- Prefer query builder or Eloquent when it provides similar performance with clearer intent and framework conventions.
- Ensure raw query result shapes are clear and handled consistently.

## Readability And Local Conventions

- Flag query code whose structure obscures intent, especially deeply nested closures, duplicated filter fragments, unclear raw expressions, or controller methods carrying complex reusable query logic.
- Prefer local scopes, query objects, actions, or repository patterns only when the project already uses them and the extraction improves clarity.
- Keep readability findings at `P3` unless the unclear query structure creates a concrete correctness, data-boundary, or performance risk.
- Avoid style-only comments where the query is already clear, efficient, and consistent with the codebase.

## Tests And Validation

- Inspect relevant tests for changed query paths, especially list endpoints, resources, exports, reports, jobs, and relationship-heavy code.
- Recommend query-count or regression tests only when the project already has helpers/patterns or the risk is material.
- Use Laravel Boost MCP read-only validation only when necessary and safe. If validation would require a possible mutation or uncertain application execution, do not run it.
- Record commands, docs, and read-only validation checks in `Checks Run`.
