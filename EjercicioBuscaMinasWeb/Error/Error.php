<?php namespace Error;


class Error {
  const BAD_REQUEST = 400;
  const FORBIDDEN = 403;
  const NOT_FOUND = 404;
  const INTERNAL_SERVER_ERROR = 500;

  static function jsonResponse($cod, $mes) {
      header('HTTP/1.1 ' . $cod . ' ' . $mes);
      return json_encode(["cod" => $cod, "mes" => $mes]);
  }

  static function permisosDenegados() {
      return self::jsonResponse(self::FORBIDDEN, "No tienes permisos de administrador");
  }

  static function updatePersona() {
      return self::jsonResponse(self::BAD_REQUEST, "No se ha podido actualizar datos");
  }

  static function credencialesInvalidos() {
      return self::jsonResponse(self::BAD_REQUEST, "Credenciales inválidos");
  }

  static function eliminarPersona() {
      return self::jsonResponse(self::BAD_REQUEST, "Error al eliminar");
  }

  static function demasiadosArgumentos() {
      return self::jsonResponse(self::BAD_REQUEST, "Demasiados argumentos");
  }

  static function noArgumentos() {
      return self::jsonResponse(self::BAD_REQUEST, "Argumento no soportado");
  }
}
