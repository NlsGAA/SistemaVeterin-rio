<?php

setcookie('nomeFichaTecnica', '', time() + (-86400 * 300000));
setcookie('racaFichaTecnica', '', time() + (-86400 * 300000));
setcookie('especieFichaTecnica', '', time() + (-86400 * 300000));
setcookie('pesoFichaTecnica', '', time() + (-86400 * 300000));
setcookie('coloracaoFichaTecnica', '', time() + (-86400 * 300000));
setcookie('idadeFichaTecnica', '', time() + (-86400 * 300000));
setcookie('procedenciaFichaTecnica', '', time() + (-86400 * 300000));

header('Location: fichaTec.html');