# Review Checklist

Use this checklist after discovering the diff. Keep findings grounded in changed behavior and surrounding code.

## Correctness

- Changed inputs, outputs, state transitions, and side effects.
- Callers and callees affected by the changed code.
- Edge cases, nullability, empty states, invalid values, and boundary conditions.
- Error handling, exception behavior, retries, timeouts, and async ordering.
- Data persistence, queries, transactions, migrations, and rollback behavior.
- API contracts, response shapes, status codes, serialization, and backward compatibility.
- UI behavior, loading/error/empty states, accessibility regressions, and interaction changes.

## Security

Check changed trust boundaries:

- Authentication and session behavior.
- Authorization, policies, ownership checks, and permission narrowing/broadening.
- Input validation, escaping, output encoding, CSRF, XSS, SSRF, open redirects.
- SQL/query safety, command execution, deserialization, file paths, uploads.
- Secrets, tokens, credentials, logging, and sensitive data exposure.
- Dependency/config changes that alter security posture.

Do not perform a broad security audit of unrelated code. A security finding needs a concrete path from changed code to impact.

## Tests

For each behavioral, security, validation, persistence, API, or error-handling change:

- Inspect related tests and removed tests.
- Determine whether tests protect the intended behavior and important edge cases.
- Report missing tests only when regression risk is concrete.
- Recommend the specific test that should exist.
- Put inconclusive test discovery in `Residual Risk`.

## Dependencies and Compatibility

- Inspect manifest changes and lockfiles when dependencies changed.
- Check resolved versions, framework compatibility, scripts, plugins, service providers, and transitive upgrades when relevant.
- Use web access for current advisories, release notes, package docs, or compatibility questions raised by the diff.
- Cite authoritative sources when external evidence materially supports a finding.

## Maintainability, Documentation, and Consistency

Report these only when they affect merge confidence or future correctness:

- Duplicated business rules that can diverge.
- Brittle coupling around important behavior.
- Missing documentation for public APIs, operational steps, migrations, or security behavior.
- Inconsistency with nearby project patterns that creates maintainability risk.
- PSR-12 violations in PHP or equivalent repo-defined formatting violations.

Avoid taste comments, broad refactor suggestions, naming preferences, and vague "could be cleaner" feedback.

## Web Access

Use web access only for targeted verification:

- dependency advisories
- package compatibility
- framework upgrade notes
- CVEs or vendor advisories
- unknown framework helpers/APIs or expected implementation details

Prefer official docs, package registries, GitHub Security Advisories, CVE/NVD records, vendor advisories, release notes, and framework documentation. Avoid blogs, forums, and search snippets unless they point to authoritative sources.
