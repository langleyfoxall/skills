# Diff Analysis

Use this reference before generating quiz questions.

## Objective

Understand the meaningful changes between the current branch and the base branch before writing questions.

The quiz should be based on what changed, why it changed, and what effects the changes have.

## Analysis Steps

### 1. Identify Changed Areas

Look for:

- Changed files
- Added files
- Deleted files
- Renamed files
- Updated tests
- Updated configuration
- Updated dependencies
- Updated documentation

Summarize the main areas of change before generating questions.

### 2. Classify Each Meaningful Change

Classify changes using one or more of these categories:

- Behavioural change
- Business logic change
- Validation change
- Security or permissions change
- API contract change
- Error handling change
- Data model change
- Persistence or query change
- UI or user-facing change
- Test coverage change
- Refactor with no intended behaviour change
- Configuration change
- Dependency change

### 3. Ignore Noise

Ignore or deprioritize:

- Formatting-only changes
- Import reordering
- Comments with no behavioural impact
- Generated files
- Lockfiles, unless dependency changes are central
- Snapshot updates, unless they reveal a meaningful output change
- Renames with no behavioural impact
- Dead code removal with no functional effect

### 4. Identify Behavioural Impact

For each meaningful change, determine:

- What behaviour existed before?
- What behaviour exists now?
- Who or what calls the changed code?
- What downstream code is affected?
- What inputs produce different outputs?
- What errors or edge cases behave differently?
- What assumptions changed?

### 5. Identify Test Intent

When tests are changed, determine:

- What behaviour the test protects
- Whether the test documents the intended behaviour
- Whether a removed test indicates removed behaviour
- Whether new test cases reveal edge cases
- Whether tests changed because implementation changed or requirements changed

### 6. Identify Risk

Consider likely regression risks:

- Existing callers receive different responses
- Validation rejects previously accepted input
- Errors are thrown, swallowed, or transformed differently
- Data is persisted differently
- Permissions are broader or narrower
- UI states render differently
- Async behaviour or ordering changes
- Performance-sensitive paths are affected

### 7. Select Quiz Topics

Prioritize questions in this order:

1. Behavioural changes
2. Business logic changes
3. Validation or security changes
4. API or interface contract changes
5. Error handling changes
6. Data flow or persistence changes
7. Integration between components
8. Test intent
9. Regression risks
10. Refactors, only if understanding the new structure matters

### 8. Determine Quiz Size

Use:

- 2 questions for small, isolated diffs
- 3 questions for moderate diffs
- 4-5 questions for larger or riskier diffs

Do not create more questions just to fill space.

If there are fewer meaningful changes, ask fewer questions.

## Output of Analysis

Before creating questions, form an internal summary containing:

- Main changed components
- Meaningful behaviour changes
- Important tests
- Risks or edge cases
- Best topics to quiz on

Use that summary to generate the quiz.