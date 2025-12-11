package es.dwes.UT01;

import java.io.InputStream;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import jakarta.annotation.PostConstruct;
import jakarta.enterprise.context.RequestScoped;
import jakarta.faces.context.FacesContext;
import jakarta.inject.Named;
import jakarta.json.Json;
import jakarta.json.JsonArray;
import jakarta.json.JsonObject;
import jakarta.json.JsonReader;


@Named("helloBean")
@RequestScoped
public class HelloBean implements Serializable {

    private List<Usuario> usuarios;

    private String nombre = "María";
    private int edad = 28;

public String getNombre() {
        return nombre;
    }

    public int getEdad() {
        return edad;
    }

    public List<Producto> getProductos() {
        return 
        List.of(
            new Producto("Manzanas", 2.5),
            new Producto("Peras", 3.0),
            new Producto("Plátanos", 1.8)
        );
    }

 // Clase interna para productos
    public static class Producto {
        private String nombre;
        private double precio;

        public Producto(String nombre, double precio) {
            this.nombre = nombre;
            this.precio = precio;
        }

        public String getNombre() { return nombre; }
        public double getPrecio() { return precio; }
    }

  @PostConstruct
public void init() {
    usuarios = new ArrayList<>();

    try (InputStream is = FacesContext.getCurrentInstance().getExternalContext()
            .getResourceAsStream("/resources/data/usuarios.json");
         JsonReader reader = Json.createReader(is)) {

        JsonArray jsonArray = reader.readArray();

        for (JsonObject u : jsonArray.getValuesAs(JsonObject.class)) {
            // Leer campos básicos
            String nombre = u.getString("nombre", "");
            String apellidos = u.getString("apellidos", "");
            String dni = u.getString("dni", "");
            String email = u.getString("email", "");
            int edad = u.getInt("edad", 0);

            // Leer pagos
            Map<String, Double> pagosMap = new HashMap<>();
            JsonObject pagosJSON = u.getJsonObject("pagos");
            if (pagosJSON != null) {
                for (String mes : pagosJSON.keySet()) {
                    Double valor = pagosJSON.isNull(mes) ? null : pagosJSON.getJsonNumber(mes).doubleValue();
                    pagosMap.put(mes, valor);
                }
            }

            // Crear usuario y añadir a la lista
            usuarios.add(new Usuario(nombre, apellidos, dni, email, edad, pagosMap));
        }

    } catch (Exception e) {
        e.printStackTrace();
    }
}


    public List<Usuario> getUsuarios() {
        return usuarios;
    }
}

