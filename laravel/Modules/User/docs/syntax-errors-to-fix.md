# Syntax Errors da Fixare - Modulo User

## 🚨 File con Errori Attivi

### 1. PasswordResetConfirmWidget.php

**Path**: `Modules/User/app/Filament/Widgets/Auth/PasswordResetConfirmWidget.php`

**Errore**: `syntax error, unexpected token "catch"` alla linea 179

**Causa**: Conflitto Git mal risolto - manca corrispondente `try {` o parentesi chiuse male

**Linea problematica**: 179
```php
} catch (Exception $e) {  // ← catch orfano, manca try
```

**Contesto** (linee 125-182):
```php
// Metodo handlePasswordReset()
if ($this->currentState !== 'form') {
    return;
}

$this->currentState = 'loading';

try {  // ← Questo try ESISTE (linea 132)
    $data = $this->form->getState();
<<<<<<< HEAD
    
    $response = Password::broker()->reset(...);
    
=======

    $response = Password::broker()->reset(...);

>>>>>>> 6ed19256f (.)
    if ($response === Password::PASSWORD_RESET) {
        // Success handling
    } else {
        $this->handleResetError($response);
    }
} catch (Exception $e) {  // ← Linea 179
    $this->handleResetError('passwords.generic_error');
}
```

**Analisi**:
Il `try` esiste alla linea 132, quindi il problema NON è catch orfano.

<<<<<<< HEAD
**Ipotesi**: 
- Duplicazioni interne al try block causano syntax error
- Linea 126 duplicata (if statement)
- Linea 153 duplicata (if check)  
=======
**Ipotesi**:
- Duplicazioni interne al try block causano syntax error
- Linea 126 duplicata (if statement)
- Linea 153 duplicata (if check)
>>>>>>> 6ed19256f (.)
- Linea 166 duplicata (Assert)
- Linea 174 duplicata ($this->js)

**Fix Necessario**:
Rimuovere tutte le duplicazioni conservando UNA SOLA versione per statement.

**Versione Corretta** (deduplicate):
```php
if ($this->currentState !== 'form') {
    return;
}

$this->currentState = 'loading';

try {
    $data = $this->form->getState();
<<<<<<< HEAD
    
=======

>>>>>>> 6ed19256f (.)
    $response = Password::broker()->reset(
        [
            'token' => $this->token,
            'email' => $data['email'],
            'password' => $data['password'],
        ],
        function (Authenticatable $user, string $password): void {
            /** @var Model&Authenticatable $user */
            $user->setAttribute('password', Hash::make($password));
            $user->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        },
    );
<<<<<<< HEAD
    
    if ($response === Password::PASSWORD_RESET) {
        $this->currentState = 'success';
        
=======

    if ($response === Password::PASSWORD_RESET) {
        $this->currentState = 'success';

>>>>>>> 6ed19256f (.)
        Notification::make()
            ->title(__('user::auth.password_reset.success.title'))
            ->body(__('user::auth.password_reset.success.message'))
            ->success()
            ->duration(8000)
            ->send();
<<<<<<< HEAD
        
        Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        $user = XotData::make()->getUserByEmail($email);
        Auth::guard()->login($user);
        
=======

        Assert::string($email = $data['email'], __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        $user = XotData::make()->getUserByEmail($email);
        Auth::guard()->login($user);

>>>>>>> 6ed19256f (.)
        $this->js('setTimeout(() => { window.location.href = "' . route('login') . '"; }, 3000);');
    } else {
        $this->handleResetError($response);
    }
} catch (Exception $e) {
    $this->handleResetError('passwords.generic_error');
}
```

**Status**: ⏸️ **File probabilmente in modifica dall'utente** - Skipato per evitare sovrascritture

**Priority**: P0 - CRITICO (blocca avvio applicazione)

<<<<<<< HEAD
**Azione Richiesta**: 
=======
**Azione Richiesta**:
>>>>>>> 6ed19256f (.)
1. Utente finisce modifiche
2. Rimuove duplicazioni (linee 126, 153, 166, 174)
3. Verifica syntax con `php -l PasswordResetConfirmWidget.php`

---

## ✅ File Fixati

### 1. PasswordResetConfirmWidget.php

**Path**: `Modules/User/app/Filament/Widgets/Auth/PasswordResetConfirmWidget.php`

**Errori trovati e fixati**:
- ❌ Properties duplicate (linee 44-48): `$data`, `$token`, `$email`, `$currentState`, `$errorMessage`
- ❌ Metodi `->disabled()` duplicati nel form schema

**Fix applicato**: Rimosse tutte le duplicazioni, mantenuta versione moderna con `?type` syntax

**Verifica**: `php -l` ✅ No syntax errors

**Status**: ✅ **FIXATO**

---

<<<<<<< HEAD
**Documento creato**: Gennaio 2025  
**Pattern rilevato**: Conflitti Git risolti male mantenendo BOTH changes invece di choosing  
**Strategia fix**: Deduplica righe consecutive identiche, mantieni versione più moderna

=======
**Documento creato**: Gennaio 2025
**Pattern rilevato**: Conflitti Git risolti male mantenendo BOTH changes invece di choosing
**Strategia fix**: Deduplica righe consecutive identiche, mantieni versione più moderna
>>>>>>> 6ed19256f (.)
