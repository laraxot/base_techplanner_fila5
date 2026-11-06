---
title: "Employee - PHILOSOPHY"
module: Employee
bmad: true
status: active
---
# Employee Module: HR Management

> **Workforce Management** — Employees, departments, absence requests, work schedules, timeline.

---

## Zen

**"People are the asset. Track hours, absences, and capacity."**

---

## Quick

### Models (10)
- **Employee** — Staff record (department, user_id, hire_date, role)
- **Department** — Org unit (parent_id for hierarchy)
- **AbsenceRequest** — Time off request (date_from, date_to, type, status: pending/approved/denied)
- **AbsenceType** — Enum-like (vacation, sick, unpaid)
- **Schedule** — Work calendar (shifts, on-call)

### Actions (10)
- `CreateAbsenceRequestAction` — Submit request
- `ApproveAbsenceRequestAction` — Manager approval
- `BuildWeeklyTimeTableAction` — Calculate weekly hours
- `BuildTimelineVisualizationAction` — Gantt chart for absences
- `BuildWorkHoursForRangeAction` — Total hours in date range
- `ExportTimeDataAction` — Export time tracking data to CSV
- `GetCurrentEmployeeDataAction` — Fetch current employee profile and status

---

## Integrations

- User (employee profile)
- Geo (work location)
- Notify (notify manager of requests)
- Job (batch payroll calculation)

---

## Best/Bad

✓ Immutable absence log (never delete, re-approve instead)
✓ Timeline visualization (manager sees overlapsat a glance)
❌ Direct database update of hours (use action instead)

---

## Roadmap

- Time-tracking integration
- Payroll calculation
- OrgChart visualization

<<<<<<< .merge_file_03G6Ak
---

```
┌──────────────────────────┐
│ Employee (HR)            │
├──────────────────────────┤
│ Models: 10               │
│ Migrations: 7            │
│ Actions: 10              │
│ Status: Stable           │
└──────────────────────────┘
```

---

- **Last verified**: 2026-09-06 (module closure workflow)

By leveraging these MCPs, the `Employee` module can ensure its critical role in managing the workforce is more efficient, secure, and transparent, ultimately contributing to a more robust and compliant HR system.
=======
<<<<<<< HEAD
By leveraging these MCPs, the `Employee` module can ensure its critical role in managing the workforce is more efficient, secure, and transparent, ultimately contributing to a more robust and compliant HR system.
=======
By leveraging these MCPs, the `Employee` module can ensure its critical role in managing the workforce is more efficient, secure, and transparent, ultimately contributing to a more robust and compliant HR system.
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_JFvy9o
