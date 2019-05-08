<?php
$idp_host = 'https://adfs.luxfacta.com/adfs/ls/idpinitiatedsignon';
$entityId = 'https://adfs.luxfacta.com/adfs/services/trust';
$x509cert   = 
    '-----BEGIN CERTIFICATE-----
    MIIFUjCCBDqgAwIBAgIRAPPwsAQawnMZ9TZKoAyHdZYwDQYJKoZIhvcNAQELBQAw
    gZAxCzAJBgNVBAYTAkdCMRswGQYDVQQIExJHcmVhdGVyIE1hbmNoZXN0ZXIxEDAO
    BgNVBAcTB1NhbGZvcmQxGjAYBgNVBAoTEUNPTU9ETyBDQSBMaW1pdGVkMTYwNAYD
    VQQDEy1DT01PRE8gUlNBIERvbWFpbiBWYWxpZGF0aW9uIFNlY3VyZSBTZXJ2ZXIg
    Q0EwHhcNMTcwMzIwMDAwMDAwWhcNMjAwMzE5MjM1OTU5WjBbMSEwHwYDVQQLExhE
    b21haW4gQ29udHJvbCBWYWxpZGF0ZWQxHTAbBgNVBAsTFFBvc2l0aXZlU1NMIFdp
    bGRjYXJkMRcwFQYDVQQDDA4qLmx1eGZhY3RhLmNvbTCCASIwDQYJKoZIhvcNAQEB
    BQADggEPADCCAQoCggEBAMR2BCsLRKUcPgRkjBJ+HD6fUVf6ilBZgoW5fpizPsCS
    dSHJZ2R/Pp0WfjaUuzd3DlVH20eEJ7AfKJ2GmGZP2JwouGQWae6G3QFGrsT8oM65
    4m0IkfmahQk3LyJnJ7Ryge45LL5eh19Kw3Dwpyn1bKLUogJQkr8c5C8hoetbyhhF
    u2P3+SDY7MWO1u2A9x2EBaBb8B4V/+JC9lbXilDW94bYX7Sd/xJcWiHiQMKeJuce
    A+MKPigF042ROZMO9JVTiSiSTfSifJ4Nnlo4uShB8mRfqc5bf6wku+swcZ1xpCL7
    bROKJHbEN6fEtz0zTXyz7q40nw/jXvR4gzy/42Y/XnMCAwEAAaOCAdkwggHVMB8G
    A1UdIwQYMBaAFJCvajqUWgvYkOoSVnPfQ7Q6KNrnMB0GA1UdDgQWBBTOhn+bICmx
    oHjRGRlW/iNCBItmMDAOBgNVHQ8BAf8EBAMCBaAwDAYDVR0TAQH/BAIwADAdBgNV
    HSUEFjAUBggrBgEFBQcDAQYIKwYBBQUHAwIwTwYDVR0gBEgwRjA6BgsrBgEEAbIx
    AQICBzArMCkGCCsGAQUFBwIBFh1odHRwczovL3NlY3VyZS5jb21vZG8uY29tL0NQ
    UzAIBgZngQwBAgEwVAYDVR0fBE0wSzBJoEegRYZDaHR0cDovL2NybC5jb21vZG9j
    YS5jb20vQ09NT0RPUlNBRG9tYWluVmFsaWRhdGlvblNlY3VyZVNlcnZlckNBLmNy
    bDCBhQYIKwYBBQUHAQEEeTB3ME8GCCsGAQUFBzAChkNodHRwOi8vY3J0LmNvbW9k
    b2NhLmNvbS9DT01PRE9SU0FEb21haW5WYWxpZGF0aW9uU2VjdXJlU2VydmVyQ0Eu
    Y3J0MCQGCCsGAQUFBzABhhhodHRwOi8vb2NzcC5jb21vZG9jYS5jb20wJwYDVR0R
    BCAwHoIOKi5sdXhmYWN0YS5jb22CDGx1eGZhY3RhLmNvbTANBgkqhkiG9w0BAQsF
    AAOCAQEAIISUDC4h5WUYqTgd96sDq4pnWXT6ZQrUe8IhzEPgka/pPXWTvEKk6oq8
    q1zpS5yzHuPHeZbf2ni/p6+sLiKcA4IiX+/zNwY8UZY41dDmR54z5Vw5nnqJspI2
    jwbCLRvQdTN212EAzNC6wrM3MV4f9Ws2TlPIDHNLTD1wtLHXGkRSBgPQy+S7yVqg
    lDWSvYPxLS6e2dQniO50hWcnKkfFrtY+1fiwYPTow9t54Okhb49f1TS5SOqPpM7Q
    xF72C+9qA+3TFazW1nUel0sFuUixzEgukg6dTrXEwQS1GGpAgeEFCLWqrF+HlG1i
    urhaq+MFDV3VmlmxyHv7IsbQYlWBcw==
    -----END CERTIFICATE-----'
;

$privateKey = 
    '-----BEGIN PRIVATE KEY-----
    MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDEdgQrC0SlHD4E
    ZIwSfhw+n1FX+opQWYKFuX6Ysz7AknUhyWdkfz6dFn42lLs3dw5VR9tHhCewHyid
    hphmT9icKLhkFmnuht0BRq7E/KDOueJtCJH5moUJNy8iZye0coHuOSy+XodfSsNw
    8Kcp9Wyi1KICUJK/HOQvIaHrW8oYRbtj9/kg2OzFjtbtgPcdhAWgW/AeFf/iQvZW
    14pQ1veG2F+0nf8SXFoh4kDCnibnHgPjCj4oBdONkTmTDvSVU4kokk30onyeDZ5a
    OLkoQfJkX6nOW3+sJLvrMHGdcaQi+20TiiR2xDenxLc9M018s+6uNJ8P4170eIM8
    v+NmP15zAgMBAAECggEBALO+JeIb1Roa1MLAG0dwCfdhW9LabmFFA53FMIYUuH0H
    ghL/aZEQugCO67qUKRV936c2rvCngIgqecZltlklBFEbEFjCCPkqelkIii2/1IBO
    oVKQXL25Ga5sxrr7FeCKQ0XpGX6yjbgpdtaF1usUl+gCEpd7kEc576sPYk0rFaNN
    zLEHZ6aI1TKDVcD1iBsFN4h6zWnFiWedNFpvLJjaIud8zYUvxUdiIaYlx7yZ6CnK
    2rzZkV7iUw78rFarW9NG3N3yxxK6B8CryrnHXBrFcdPuGItAwOX24+W2Zgyr3ogP
    DIQTlvIUncQVTRAbjjpKPNAQowYAcqBbZWTWF1B8cMECgYEA+JrFUDqUwvdY89r8
    RwGHnr6ae3srkmXmysG0akkr0QQWu9akfyatmJEy/gnD7qXi6GqvT7fiW4ZtrKC1
    mRmTUycV5fls/bTG6FFTGAXcEqAf0ok3qe8P478+KlOCCD/xL/9jN0doMjwC34Oz
    adHN4t83hocBVtri/bb1D0jLvi0CgYEAyk4mbdF2j9DFGjdTFrY/EE5T9cuVQ1Cu
    KYAmef88xqlsIEFP53OO4lHW/kNZMRmzC1DIt3qb06EDZT42B3/WjGZz8rvpuhec
    ZOykF8iYTZKWM9yMZzcFBa6eK4p7meOYyWDvPTkCq2HoOq+XdtI+lSPyHljYOeVm
    6HjMUFAOEx8CgYAMnOWX3XEAt0XnEVwtShGUZz01OJmMUukzrkI2BkJX12pD2277
    GH5EOFGq+9nZ+MabXhZI6B5u4FIeKQUtoFOOK3R793ylHo/c54tcs6dntoIGz3lo
    gL2Ao4pG4Xe+bWgSNFXXTyMlMVBAANGQc9mLQiHyDFVwD6jmkGq8fMgBfQKBgQDH
    gvrzIrfCbSl1CUqwA1t+QUEcDoJNuKuJ0hAgEE9nvH4d8UtT/urS19MnPlQf0DB6
    4FiSWiCDPS+UER5HlxOHsyJ2KEwAcniSL65EpldNaVsoGkF9KQ2S5PqoBhKPWZ28
    PBS0VB0F17Cm77R4Qi/l9WU5+HSF5G7wpPEZ41l+EQKBgDxzi0eqUVPOELozxbUl
    kGQBdwCBNz0biFaY1Tash8SqKY8v7WUl8fIoUkIbvoosj6wq7ySZg+P/J8Q3XsFU
    zmCUrS5tqLFPjaRWBq72UuH/JSpTLAdKQlU7IM6Qyr3Tk6GoU7vTO5ZRkjrLFnSq
    wH7w1X1qn7jegMX8sFYvr9sP
    -----END PRIVATE KEY-----'
;
return $settings = array(
    
    'enabled'=>true,

    'idp_host'=>$idp_host,

    'lavarel' => array(
        'useRoutes' => true,

        'routesPrefix' => '/saml2',

        /**
         * Where to redirect after logout
         */
        'logoutRoute' => '/',

        /**
         * Where to redirect after login if no other option was provided
         */
        'loginRoute' => '/',

        /**
         * Where to redirect after login if no other option was provided
         */
        'errorRoute' => '/',

        /**
         * Indicates how the parameters will be
         * retrieved from the sls request for signature validation
         */
        'retrieveParametersFromServer' => false,

        /**
         * Set here the attribute mapping between Lavarel and the IdP
         *  LavarelAttrName => IdPAttrName
         */ 
        'attrMapping' => array(
            // 'USU_ID'          => 'SAM-Account-Name',
            // 'CTE_EMAIL'       => 'E-Mail-Adresses',
            // 'CTE_NOME'        => 'Display-Name',
            // 'CTE_TEL'         => 'Telephone-Number',
            // 'USU_GERENTE'     => 'Manager',
            // 'USU_DEPARTAMENTO'=> 'Department',
            // 'CTE_EMPRESA'     => 'Company',
            // 'CTE_CARGO'       => 'Title',
        ),
    ),

    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => false, //@todo: make this depend on laravel config

    // Enable debug mode (to print errors)
    'debug' => true, //@todo: make this depend on laravel config

    // Service Provider Data that we are deploying
    'sp' => array(

        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        //'x509cert' => '',
        'x509cert'   => $x509cert,
        'privateKey' => $privateKey,

        //LARAVEL - You don't need to change anything else on the sp
        // Identifier of the SP entity  (must be a URI)
        'entityId' => $entityId, //LARAVEL: This would be set to saml_metadata route
        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array(
            // URL Location where the <Response> from the IdP will be returned
            'url' => '', //LARAVEL: This would be set to saml_acs route
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        'singleLogoutService' => array(
            // URL Location where the <Response> from the IdP will be returned
            'url' => '', //LARAVEL: This would be set to saml_sls route
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array(
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => $entityId,
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array(
            // URL Target of the IdP where the SP will send the Authentication Request Message
            'url' => $idp_host,
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-POST binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array(
            // URL Location of the IdP where the SP will send the SLO Request
            'url' => $idp_host,
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // Public x509 certificate of the IdP
        'x509cert' => $x509cert,
        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it)
         */
        // 'certFingerprint' => '',
    ),

    /***
     *
     *  OneLogin advanced settings
     *
     *
     */

    // Compression settings 
    // Handle if the getRequest/getResponse methods will return the Request/Response deflated.
    // But if we provide a $deflate boolean parameter to the getRequest or getResponse
    // method it will have priority over the compression settings.
    'compress' => array (
        'requests' => true,
        'responses' => true
    ),

    // Security settings
    'security' => array(

        /** signatures and encryptions offered */

        // Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
        // will be encrypted.
        'nameIdEncrypted' => false,

        // Indicates whether the <samlp:AuthnRequest> messages sent by this SP
        // will be signed.              [The Metadata of the SP will offer this info]
        'authnRequestsSigned' => false,

        // Indicates whether the <samlp:logoutRequest> messages sent by this SP
        // will be signed.
        'logoutRequestSigned' => false,

        // Indicates whether the <samlp:logoutResponse> messages sent by this SP
        // will be signed.
        'logoutResponseSigned' => false,

        /* Sign the Metadata
         False || True (use sp certs) || array (
                                                    keyFileName => 'metadata.key',
                                                    certFileName => 'metadata.crt'
                                                )
        */
        'signMetadata' => false,


        /** signatures and encryptions required **/

        // Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
        // <samlp:LogoutResponse> elements received by this SP to be signed.
        'wantMessagesSigned' => false,

        // Indicates a requirement for the <saml:Assertion> elements received by
        // this SP to be signed.        [The Metadata of the SP will offer this info]
        'wantAssertionsSigned' => false,

        // Indicates a requirement for the NameID element on the SAMLResponse received
        // by this SP to be present.
        'wantNameId' => false,

        // Indicates a requirement for the NameID received by
        // this SP to be encrypted.
        'wantNameIdEncrypted' => false,

        // Authentication context.
        // Set to false and no AuthContext will be sent in the AuthNRequest,
        // Set true or don't present this parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
        // Set an array with the possible auth context values: array ('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
        'requestedAuthnContext' => false,
        // Allows the authn comparison parameter to be set, defaults to 'exact' if
        // the setting is not present.
        'requestedAuthnContextComparison' => 'exact',
        // Indicates if the SP will validate all received xmls.
        // (In order to validate the xml, 'strict' and 'wantXMLValidation' must be true).
        'wantXMLValidation' => true,

        // Algorithm that the toolkit will use on signing process. Options:
        //    'http://www.w3.org/2000/09/xmldsig#rsa-sha1'
        //    'http://www.w3.org/2000/09/xmldsig#dsa-sha1'
        //    'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256'
        //    'http://www.w3.org/2001/04/xmldsig-more#rsa-sha384'
        //    'http://www.w3.org/2001/04/xmldsig-more#rsa-sha512'
        'signatureAlgorithm' => 'http://www.w3.org/2000/09/xmldsig#rsa-sha1',
        // ADFS URL-Encodes SAML data as lowercase, and the toolkit by default uses
        // uppercase. Turn it True for ADFS compatibility on signature verification
        'lowercaseUrlencoding' => false,
    ),

    // Contact information template, it is recommended to suply a technical and support contacts
    'contactPerson' => array(
        'technical' => array(
            'givenName' => 'name',
            'emailAddress' => 'no@reply.com'
        ),
        'support' => array(
            'givenName' => 'Support',
            'emailAddress' => 'no@reply.com'
        ),
    ),

    // Organization information template, the info in en_US lang is recomended, add more if required
    'organization' => array(
        'en-US' => array(
            'name' => 'Name',
            'displayname' => 'Display Name',
            'url' => 'http://url'
        ),
    ),

);
