# Example Questions

Use these examples as patterns only. Adapt every question to the actual branch diff. Do not reuse names, functions, or scenarios unless they appear in the diff.

## Good Question Patterns

### Behavioural impact

**Question:**  
A new validation step was added before saving an entity. What behaviour does this change introduce?

- A) Invalid data is rejected earlier, preventing persistence and downstream side effects.
- B) Invalid data is still saved, but a warning is logged.
- C) The validation only affects tests and has no runtime effect.
- D) The validation runs after persistence, so saved data is unchanged.

**Tests:** Whether the user understands the runtime impact of the change.

---

### Integration with existing code

**Question:**  
How does the new service method interact with the existing controller flow?

- A) The controller now delegates part of its previous responsibility to the service.
- B) The service bypasses the controller and handles requests directly.
- C) The controller is unchanged and the new service is unused.
- D) The service only affects database migrations.

**Tests:** Whether the user understands how the changed code connects to existing code.

---

### Edge case introduced or handled

**Question:**  
Which edge case is now handled by the updated logic?

- A) A missing optional value no longer causes the operation to fail.
- B) Duplicate records are now always allowed.
- C) Failed requests are silently ignored.
- D) The change only affects formatting.

**Tests:** Whether the user noticed a meaningful edge case in the diff.

---

### Test coverage

**Question:**  
What behaviour is the new or updated test primarily verifying?

- A) The changed business rule behaves correctly under the new condition.
- B) The file compiles without syntax errors.
- C) The exact implementation details are unchanged.
- D) The database schema is recreated from scratch.

**Tests:** Whether the user understands why the test was changed.

---

### Risk or regression

**Question:**  
What is the most likely regression risk introduced by this change?

- A) Existing callers may now receive a different result or error for the same input.
- B) Only comments were changed, so there is no possible risk.
- C) The change can only affect local development.
- D) The risk is limited to unrelated modules.

**Tests:** Whether the user can reason about consequences beyond the happy path.