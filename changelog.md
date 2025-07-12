# Changelog

All notable changes to this project will be documented in this file.

This project adheres to [Semantic Versioning](https://semver.org/).

---

## [1.0.0] - 2025-07-12

### Added
- Initial stable release.
- Trait-based reusable API response builder.
- Constants for HTTP status codes and default messages.
- `sendSuccess()` and `sendSuccessWith()` methods.
- `sendFailure()`, `validationFailed()`, `notFound()`, `unauthorized()`, `forbidden()`, and `dataProcessFailed()` methods.
- PSR-4 autoloading via Composer.
- Laravel service provider with auto-discovery.
- MIT License