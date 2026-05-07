# Finding Examples

Use these examples to calibrate severity and specificity. Findings must be concrete, actionable, and grounded in changed code.

## Good Findings

```md
[P1] Authorization bypass when updating another user's invoice
File: app/Http/Controllers/InvoiceController.php:84
Issue: The update path loads the invoice by ID but no longer scopes it to the authenticated account or calls the policy.
Impact: Any authenticated user who can guess an invoice ID can modify another account's invoice.
Recommendation: Restore the policy check or scope the query to the current account before update.
```

```md
[P2] Migration can fail on existing rows
File: database/migrations/2026_05_07_100000_add_status_to_orders.php:17
Issue: The migration adds a non-nullable column without a default to a table that can already contain rows.
Impact: Deploying to an environment with existing orders can fail before the application code is released.
Recommendation: Add a default, backfill before enforcing non-null, or split the change into safe deploy steps.
```

```md
[P3] PHP formatting does not match PSR-12
File: app/Services/InvoiceTotal.php:31
Issue: The new method keeps the opening brace on the same line, while this PHP project follows PSR-12 through Pint.
Impact: The style check will fail and the file is inconsistent with nearby code.
Recommendation: Run the configured formatter or move the method brace to the next line.
```

## Bad Findings

```md
[P3] Method could be cleaner
File: app/Services/InvoiceService.php:22
Issue: This method is long.
Recommendation: Refactor it.
```

This is too vague and does not explain concrete risk.

```md
[P2] Might be insecure
File: app/Http/Controllers/ProfileController.php:44
Issue: This looks like it could have an auth problem.
Recommendation: Check auth.
```

This is speculation. Inspect the policy, routes, middleware, and caller context before reporting.

```md
[P3] Variable name preference
File: resources/js/components/UserCard.tsx:12
Issue: Rename `data` to `userData`.
Recommendation: Use a clearer name.
```

This is a taste comment unless the name hides a real bug or contradicts a strong project convention.
