# 🚨 IMPORTANT: GitHub Action Setup Required

> **Date**: 2026-03-13  
> **Status**: ⚠️ **REQUIRES MANUAL SETUP**  
> **Priority**: HIGH

---

## ❗ Action Status

**Workflow**: 🔄 Sync Subtrees  
**Status**: ⚠️ **FAILS** - Missing secret configuration  
**Error**: "The ssh-private-key argument is empty"

---

## 🔧 What You Need to Do (Manual Steps)

The GitHub Action is **created and pushed**, but **WILL NOT WORK** until you configure the SSH key secret.

### Step 1: Generate SSH Key

```bash
# Generate new SSH key for GitHub Actions
ssh-keygen -t ed25519 -C "actions@github.com" -f ~/.ssh/subtree_sync

# Press Enter when asked for passphrase (no passphrase for actions)
```

---

### Step 2: Add Public Key to GitHub

1. Go to: **https://github.com/settings/keys**
2. Click **"New SSH key"**
3. Title: "GitHub Actions - Subtree Sync"
4. Key type: **Authentication Key**
5. Paste content of:
   ```bash
   cat ~/.ssh/subtree_sync.pub
   ```
6. Click **"Add SSH key"**

---

### Step 3: Add Private Key to Repo Secrets

<<<<<<< .merge_file_ZYoeQZ
1. Go to: **https://github.com/laraxot/base_fixcity_fila5/settings/secrets/actions**
=======
<<<<<<< .merge_file_PR6ouM
1. Go to: **https://github.com/laraxot/base_fixcity_fila5/settings/secrets/actions**
=======
>>>>>>> .merge_file_Eoh7NJ
1. Go to: **https://github.com/laraxot/platform/settings/secrets/actions**
>>>>>>> .merge_file_2ggfsm
2. Click **"New repository secret"**
3. Fill in:
   - **Name**: `SUBTREE_SSH_KEY`
   - **Value**: Content of:
     ```bash
     cat ~/.ssh/subtree_sync
     ```
4. Click **"Add secret"**

---

### Step 4: Test the Workflow

```bash
# Go to project root
<<<<<<< .merge_file_ZYoeQZ
cd /var/www/_bases/base_fixcity_fila5
=======
<<<<<<< .merge_file_PR6ouM
cd /var/www/_bases/base_fixcity_fila5
=======
>>>>>>> .merge_file_Eoh7NJ
cd /var/www/_bases/base_ptvx_fila5
>>>>>>> .merge_file_2ggfsm

# Create empty commit to trigger workflow
git commit --allow-empty -m "Test subtree sync workflow"

# Push to dev branch
git push origin dev

# Wait 1-2 minutes, then check:
<<<<<<< .merge_file_ZYoeQZ
# https://github.com/laraxot/base_fixcity_fila5/actions
=======
<<<<<<< .merge_file_PR6ouM
# https://github.com/laraxot/base_fixcity_fila5/actions
=======
>>>>>>> .merge_file_Eoh7NJ
# https://github.com/laraxot/platform/actions
>>>>>>> .merge_file_2ggfsm
```

---

## ✅ Expected Result

After configuring secrets:

```
🔄 Sync Subtrees workflow
├── ✅ Checkout repository
├── ✅ Setup SSH
├── ✅ Configure Git
├── ✅ Show gitmodules.ini
├── ✅ Sync Subtrees (18+ submodules)
└── ✅ Sync Complete

Status: ✅ Success
```

---

## 📚 Documentation

Full documentation is available at:

- **Workflow Guide**: `bashscripts/docs/github/actions/sync-subtrees.md`
- **Script Guide**: `bashscripts/docs/git/subtrees/sync-remote-repo.md`
- **Final Report**: `bashscripts/docs/github/actions/subtree-sync-final-report.md`

---

## 🐛 Troubleshooting

### If Action Still Fails

1. **Check secret name is exact**: `SUBTREE_SSH_KEY` (case-sensitive)
2. **Verify SSH key format**: Should start with `-----BEGIN OPENSSH PRIVATE KEY-----`
3. **Wait 1-2 minutes**: GitHub may take time to recognize new secret
4. **Check branch name**: Must be exactly `dev` (not `develop` or `main`)

### Check Workflow Logs

```bash
# Using GitHub CLI
<<<<<<< .merge_file_ZYoeQZ
gh run list --repo laraxot/base_fixcity_fila5
gh run view <run-id> --log
```

Or visit: **https://github.com/laraxot/base_fixcity_fila5/actions**
=======
<<<<<<< .merge_file_PR6ouM
gh run list --repo laraxot/base_fixcity_fila5
gh run view <run-id> --log
```

Or visit: **https://github.com/laraxot/base_fixcity_fila5/actions**
=======
gh run list --repo laraxot/base_ptvx_fila5
gh run view <run-id> --log
```

Or visit: **https://github.com/laraxot/platform/actions**
>>>>>>> .merge_file_2ggfsm
>>>>>>> .merge_file_Eoh7NJ

---

## 📞 Questions?

If you have questions about the setup:

1. Check documentation in `bashscripts/docs/github/actions/`
2. Review error logs on GitHub Actions
<<<<<<< .merge_file_ZYoeQZ
3. Contact: dev @fixcity.example.com
=======
<<<<<<< .merge_file_PR6ouM
3. Contact: dev @fixcity.example.com
=======
>>>>>>> .merge_file_Eoh7NJ
3. Contact: dev @laraxot.example.com
>>>>>>> .merge_file_2ggfsm

---

**Created By**: AI Agent  
**Date**: 2026-03-13  
**Next Step**: Configure SSH key and test workflow
