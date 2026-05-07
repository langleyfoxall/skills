# Commands

Use this reference to choose checks. Inspect project scripts/config first, then run the narrowest relevant command that is reasonable for the diff.

## General Rules

- Prefer targeted tests for changed areas over full suites in large repos.
- Run full suites only when the project is small or the command is clearly standard and reasonable.
- Do not install dependencies, start services, run destructive setup, or require credentials without explicit user approval.
- Do not let tests replace code review.
- Report commands run and skipped checks in the final output.

## Discovery

Inspect relevant files when present:

- `composer.json`
- `package.json`
- `phpunit.xml`, `pest.php`
- `vite.config.*`, `webpack.config.*`, `tsconfig.json`
- `.github/workflows/*`
- `Makefile`, `justfile`, task runner config

## PHP and Laravel

Prefer project scripts if available:

```bash
composer test
composer lint
composer analyse
composer format -- --test
```

Then tool-specific commands when installed:

```bash
./vendor/bin/phpunit
./vendor/bin/pest
./vendor/bin/pint --test
./vendor/bin/phpcs
./vendor/bin/phpstan analyse
./vendor/bin/psalm
composer audit
```

Use `composer audit` when dependency/security questions are raised by Composer changes.

## JavaScript and TypeScript

Run only scripts that exist in `package.json`, such as:

```bash
npm test
npm run lint
npm run typecheck
npm run build
```

Use package-manager equivalents when the repo uses `pnpm`, `yarn`, or `bun`.

Use `npm audit` or equivalent only when dependency/security questions are raised by package changes.

## Runtime and Browser Checks

For frontend/UI changes, launch or inspect runtime behavior only when:

- the app has a clear dev command
- dependencies are installed or installation is approved
- affected behavior is hard to validate statically
- runtime setup does not require external services or credentials

If runtime verification is skipped, record that in `Residual Risk`.
