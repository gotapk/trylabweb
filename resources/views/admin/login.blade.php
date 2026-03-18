<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRY LAB OS | AUTH_REQUIRED</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #050505;
            --terminal-cyan: #00f2ff;
            --terminal-red: #ff3c3c;
            --text-main: #e0e0e0;
            --glass-bg: rgba(20, 20, 20, 0.85);
            --border-glow: 0 0 10px rgba(0, 242, 255, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Space Mono', monospace;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-image: 
                linear-gradient(rgba(0, 242, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 242, 255, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .login-container {
            width: 400px;
            padding: 2.5rem;
            background: var(--glass-bg);
            border: 1px solid var(--terminal-cyan);
            box-shadow: var(--border-glow);
            backdrop-filter: blur(10px);
            position: relative;
        }

        .login-container::before {
            content: "[AUTH.PROTECTED.SYSTEM]";
            position: absolute;
            top: -12px;
            left: 20px;
            background: var(--bg-color);
            padding: 0 10px;
            color: var(--terminal-cyan);
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: var(--terminal-cyan);
            text-transform: uppercase;
            letter-spacing: 3px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            color: rgba(255,255,255,0.6);
        }

        input {
            width: 100%;
            padding: 0.8rem;
            background: rgba(0,0,0,0.5);
            border: 1px solid rgba(0, 242, 255, 0.2);
            color: var(--terminal-cyan);
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: var(--terminal-cyan);
            box-shadow: 0 0 10px rgba(0, 242, 255, 0.2);
        }

        button {
            width: 100%;
            padding: 1rem;
            background: transparent;
            border: 1px solid var(--terminal-cyan);
            color: var(--terminal-cyan);
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        button:hover {
            background: var(--terminal-cyan);
            color: #000;
            box-shadow: 0 0 20px rgba(0, 242, 255, 0.5);
        }

        .error-msg {
            color: var(--terminal-red);
            font-size: 0.7rem;
            margin-top: 0.5rem;
            text-transform: uppercase;
        }

        .footer-note {
            margin-top: 2rem;
            font-size: 0.6rem;
            color: rgba(255,255,255,0.3);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>TRY LAB LOGIN</h1>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>IDENTIFIER_UUID (EMAIL)</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>ACCESS_TOKEN (PASSWORD)</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">EXECUTE_LOGIN</button>
        </form>

        <div class="footer-note">
            OS.SYSTEM.VERSION.1.0_PROD <br>
            UNAUTHORIZED_ACCESS_IS_LOGGED
        </div>
    </div>
</body>
</html>
