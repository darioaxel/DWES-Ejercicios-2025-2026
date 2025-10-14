package es.dwes.UT04.config;

import jakarta.ws.rs.ApplicationPath;
import jakarta.ws.rs.core.Application;

@ApplicationPath("mvc")  // todas las rutas comienzan con /mvc
public class AppConfig extends Application {
}

