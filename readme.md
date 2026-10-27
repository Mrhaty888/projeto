Nome: Marco Antônio Sancho Sant'Ana dos Santos RA: 2205946

Como uma das condições era separar as classes e seu index em pastas separadas tive que usar:

require_once __DIR__ . '/Arquivo.php';

Porque se usasse (require_once __DIR__ . '/vendor/autoload.php';), o arquivo index daria erro pq não conseguiria acessar o vendor nas pastas separadas.