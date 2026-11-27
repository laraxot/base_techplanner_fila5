# Comment behavioral contract index

This is the machine-readable inventory of behavioral contracts owned by the **Comment** module.

A contract describes an existing public operation or boundary. It names the owner, input, output, stable invariants, side effects and their order, errors, and non-goals. Every invariant gets a stable ID and a Pest group when a test exists; missing coverage is recorded as debt instead of being implied away.

## Contracts
- [approve-comment-action](approve-comment-action.md)
- [delete-comment-reaction-action](delete-comment-reaction-action.md)
- [ensure-comment-rate-limit-action](ensure-comment-rate-limit-action.md)
- [get-comment-reaction-counts-action](get-comment-reaction-counts-action.md)
- [notify-approved-comment-action](notify-approved-comment-action.md)
- [process-comment-action](process-comment-action.md)
- [react-to-comment-action](react-to-comment-action.md)
- [reject-comment-action](reject-comment-action.md)
- [resolve-comment-approving-users-action](resolve-comment-approving-users-action.md)
- [sanitize-comment-html-action](sanitize-comment-html-action.md)
- [send-notifications-for-pending-comment-action](send-notifications-for-pending-comment-action.md)
- [should-automatically-approve-comment-action](should-automatically-approve-comment-action.md)

## Authoring

Use [Xot contract authoring standard](../../../Xot/docs/contracts/contract-authoring-standard.md) and the shared template. Legacy behavior is documented as-is and is not a model for new code.
