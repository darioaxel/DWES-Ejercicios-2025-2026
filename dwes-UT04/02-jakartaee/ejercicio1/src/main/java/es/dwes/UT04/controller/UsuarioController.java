package es.dwes.UT04.controller;

import es.dwes.UT04.dao.UsuarioDAO;
import es.dwes.UT04.model.Usuario;
import jakarta.inject.Inject;
import jakarta.mvc.Controller;
import jakarta.mvc.Models;
import jakarta.ws.rs.GET;
import jakarta.ws.rs.Path;
import jakarta.ws.rs.Produces;
import jakarta.ws.rs.core.MediaType;

import java.sql.SQLException;
import java.util.List;

@Path("/usuarios")
@Controller
public class UsuarioController {

    @Inject
    private Models models;

    private UsuarioDAO usuarioDAO = new UsuarioDAO();

    @GET
    @Produces(MediaType.TEXT_HTML)
    public String listarUsuarios() {
        try {
            List<Usuario> usuarios = usuarioDAO.listarTodos();
            models.put("usuarios", usuarios);
        } catch (SQLException e) {
            models.put("error", "Error BD: " + e.getMessage());
        }
        return "usuarios.xhtml";  // busca en /WEB-INF/views/
    }
}
