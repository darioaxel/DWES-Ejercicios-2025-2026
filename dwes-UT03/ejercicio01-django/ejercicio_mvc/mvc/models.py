from django.db import models

# Create your models here.

class Producto(models.Model):
    nombre = models.CharField(max_length=50)
    precio = models.DecimalField(max_digits=6, decimal_places=2)
    oferta = models.BooleanField(default=False)

    def con_iva(self):
        return self.precio * 1.21
