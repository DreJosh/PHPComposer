# phpComposer

O composer quando tem uma modificação pode ser que não reconheça por conta disso temos que utilizar comando para atualizar como : `composer intall` e `composer update`.

Aqui criamos um caminho para realizar o autoload da classe com o composer
`"User\\BuscadorDeCursos\\": "src/"`


### Classmap

O Composer lê o arquivo que definimos no classmap e mapeia as classes dentro dele para sempre executar um require quando elas forem acessadas. Com isso, já resolvemos o problema de classes que não implementem a PSR4, por exemplo - inclusive problemas maiores, como arquivos que contêm mais de uma classe ou nos quais o nome da classe não é igual ao nome do arquivo.

### PHPUnit

Para instalar o PHPUnit é preciso rodar o seguinte parametro.
Instalação: `composer require --dev phpunit/phpunit`
Quando colocamos um --dev na frente estamos falando que queremos que instale só para desenvolvimento, quando não queremos instalar no dev colocamos um --no-dev.

### PHP Code Sniffer

PHP_CodeSniffer é um conjunto de dois scripts PHP; o script principal que tokeniza arquivos PHP, JavaScript e CSS para detectar violações de um padrão de codificação definido e um segundo script para corrigir automaticamente violações de padrão de codificação. PHP_CodeSniffer é uma ferramenta de desenvolvimento essencial que garante que seu código permaneça limpo e consistente.phpcsphpcbf
Instalação: `composer global require "squizlabs/php_codesniffer=*"`
Para utilizar o CS basta colocar um comando de `\vendor\bin\phpcs -- standard=PSR12 src\`
Após isso será mostrado no CMD, um serie de comando que está fora do planejado.

### PHAN

Phan é um analisador estático para PHP que prefere minimizar falsos-positivos. Phan tenta provar a incorreção em vez da correção.
O Phan procura problemas comuns e verificará a compatibilidade de tipos em várias operações quando digitar as informações estão disponíveis ou podem ser deduzidas. Phan tem uma boa (mas não abrangente) compreensão do controle de fluxo e pode controlar valores em alguns casos de uso (por exemplo, matrizes, inteiros e cadeias de caracteres).
Instalação `composer require phan/phan`

### Script

Podemos criar um script para facilitar nossa vida ao executar um comando, para isso pasta adicionar ao nosso composer `composer.json`, um novo array com o nome script, após isso criamos um nome para a variavel e colocamoos o comando que ele vai executar.
`"scripts": {
    "test": "phpunit tests\\TestBuscadorDeCursos.php",
    "cs": "phpcs --standard=PSR12 src/",
    "phan": "phan --allow-polyfill-parser",
}`
Para determinar scripts dentro de outro scripts utilizamos um arroba em frente a referencia e com isso o composer entende que estamos declarando outros scripts.
`"scripts": {
    "test": "phpunit tests\\TestBuscadorDeCursos.php",
    "cs": "phpcs --standard=PSR12 src/",
    "phan": "phan --allow-polyfill-parser",
    "check": [
        "@phan",
        "@cs",
        "@test"
    ]
}`
Ao criar um script podemos declarar e descrever o que aquele script irá fazer com o comando `scripts-decriptioons` no `composer.json`.
`"scripts-descriptions": {
    "check": "Roda as verificações do código. PHAN, PHPCS e PHPUNIT"
}`