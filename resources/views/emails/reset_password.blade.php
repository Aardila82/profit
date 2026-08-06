<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #121212; color: #ffffff; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #1e1e1e; padding: 40px; border-radius: 8px; text-align: center; border: 1px solid #333; }
        h1 { color: #F5C518; }
        p { color: #cccccc; line-height: 1.6; }
        .btn { display: inline-block; padding: 15px 30px; margin: 20px 0; background-color: #F5C518; color: #121212; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .footer { margin-top: 30px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PROFIT</h1>
        <h2>Recuperación de Contraseña</h2>
        <p>Hola,</p>
        <p>Recibimos una solicitud para restablecer tu contraseña. Haz clic en el botón de abajo para asignar una nueva contraseña.</p>
        
        <a href="{{ $resetUrl }}" class="btn">Restablecer Contraseña</a>
        
        <p>Si no solicitaste este cambio, puedes ignorar este correo.</p>
        
        <div class="footer">
            <p>Este es un correo automático, por favor no respondas.</p>
        </div>
    </div>
</body>
</html>
