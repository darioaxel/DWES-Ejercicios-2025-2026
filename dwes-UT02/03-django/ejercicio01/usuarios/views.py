from django.shortcuts import render
from usuarios.models import Pago, Usuario

# Create your views here.
from django.http import HttpResponse

def usuario_view(request):

    # Obtengo los datos del modelo Usuario
    usuarios = Usuario.objects.all()
    """
    datos = {
        "nombre": "Ana",
        "apellidos": "Martínez Pérez",
        "edad": 30,
        "email": "ana@example.com",
    }
    """

    html = """
            <html>
            <head><title>Datos de un Usuario</title></head>
            <body>
                <h1>Información personal</h1>"""
    
    # Recorro los usuarios
    for usuario in usuarios:
        #Obtengo los pagos del usuario
        pagos = Pago.objects.filter(usuario=usuario)
        #Color verde si > 18, rojo si no
        color_edad = "green" if usuario.edad > 18 else "red"
        #Creo una variable para almacenar los pagos
        pagos_str = ""
        for pago in pagos:
            pagos_str += f"<li>{pago.mes} - {pago.cantidad}€</li>"
        html += f"""
                <!--Para incluir datos que se encuentran en la vista, usamos llaves como se ve a continuación -->
                <ul>
                    <li>
                        <strong>Nombre: </strong>{usuario.nombre}</br>
                        <strong>Apellidos: </strong>{usuario.apellidos}</br>
                        <strong>DNI: </strong>{usuario.dni}</br>
                        <strong>Email: </strong>{usuario.email}</br>
                        <strong>Teléfono: </strong>{usuario.telefono}</br>
                        <strong>Edad: </strong><span style="color:{color_edad}">{usuario.edad}</span></br>
                        <strong>Pagos: </strong></br>
                        <ul>{pagos_str}</ul>
                    </li>
                </ul>                
                """
    html += """
            </body>
            </html>"""

    return HttpResponse(html)