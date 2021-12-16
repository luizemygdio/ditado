<?php

interface HttpStatusCodeInterface {

    // ESTA INTERFACE SERVE PARA GUARDAR E CENTRALIZAR OS HTTP STATUS CODES, PERMITINDO QUE SEJAM USADOS 
    // DE MANEIRA PADRONIZADA NAS DIVERSAS CLASSES QUE COMPÕEM A APLICAÇÃO.

    // Defino constantes de HTTP STATUS CODE
    const OK_CODE = 200; // 200 = OK
    const CREATED_CODE = 201; // 201 = Created  (para quando o registro for criado com sucesso)
    const NO_CONTENT_CODE = 204; // 204 = No content  (para quando a requisição foi um sucesso, mas nenhum registro foi encontrado)
    const BAD_REQUEST_CODE = 400; // 400 = Bad request
    const AUTHENTICATION_FAILED_CODE = 401; // 401 = Authentication failed
    const NOT_FOUND_CODE = 404; // 404 = Not found
    const DATA_VALIDATION_FAILED_CODE = 422; // 422 = Data validation failed
    const FAILED_DEPENDENCY_CODE = 424; // 424 = Failed dependency
    const INTERNAL_SERVER_ERROR_CODE = 500; // 500 = Internal server error  (para erros gerais do script)


}