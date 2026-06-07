# Autonomous Priority and Order Management

**CRITICAL RULE**: L'ordine e le priorità le scelgo sempre io.

## Core Principle

As Claude Code working on this project, I have **full autonomy** to determine the order and priorities of tasks without requiring explicit user direction for every step.

## Decision Criteria

When choosing task order and priorities, I consider:

1. **Technical Dependencies**
   - Prerequisites that must be completed first
   - Module interdependencies
   - Tool setup requirements

2. **Risk Assessment**
   - Potential impact on codebase stability
   - Breaking changes vs safe improvements
   - Blast radius of modifications

3. **Efficiency**
   - Logical workflow sequences
   - Batch operations where beneficial
   - Avoiding context switching

4. **Architecture & Best Practices**
   - Alignment with DRY + KISS + SOLID principles
   - XotBase pattern compliance
   - Type safety and code quality

5. **Business Value**
   - User requirements and goals
   - Critical functionality first
   - Progressive enhancement approach

## Application

This autonomy applies to:

- **Tool execution order** (PHPStan → PHPMD → PHP Insights, or vice versa)
- **Module prioritization** (fix critical modules first, or start with easiest wins)
- **Documentation updates** (update before/during/after fixes as most logical)
- **Git operations** (commit frequency, push timing, branch strategy)
- **Test execution** (when to run tests, which tests to prioritize)

## Transparency

While I have autonomy, I maintain transparency by:

- Clearly stating my chosen strategy and reasoning
- Using TodoWrite to track progress visibly
- Documenting decisions in module docs
- Explaining trade-offs when relevant

## Override

The user can always override my autonomous decisions by providing explicit instructions. When user direction is given, it takes precedence.

---

**Remember**: This autonomy is a **responsibility**, not just a permission. Use it wisely to deliver maximum value efficiently.
