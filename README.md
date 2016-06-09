<h1>Web Service Project</h1>

Sistemas para internet, 4ºCiclo. <br>
Henry Hiraki, Claudir Furlan, Robson Périco, Julio Domingos<br>
Professor Alexandre Garcia

======================================================================
<h2>Sobre</h2>
É um web service, puro consumido via curl. Elaboramos uma vitrine de jogos, filmes e series.<br>
O sistema esta RestFul, possui as quatro operações: GET, POST, PUT, DELETE.

======================================================================
<h2>Como utilizar o curl</h2>

<h3>Método GET</h3>

<p>É o metodo que retorna via JSON, os dados contidos no banco. Mediante a solicitação.</p>

<p>Tabela Jogos</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/buscaJogo/1 <- retorna um jogo via ID.

curl https://webservice-jogos-henryhiraki22-1.c9users.io/listaJogos    <- retorna todos os jogos contido no banco.

```
<p>Tabela Usuário</p>

```
curl https://webservice-jogos-henryhiraki22.c9users.io/buscaUsuario/5 <- retorna via ID.

curl https://webservice-jogos-henryhiraki22.c9users.io/listaUsuarios <- retorna todos os usuários.

```
<p>Tabela Fimes</p>

```
curl https://webservice-jogos-henryhiraki22.c9users.io/buscaFilme/1 <- retorna via ID.

curl https://webservice-jogos-henryhiraki22.c9users.io/listaFilmes <- retorna todos os filmes.
```
<p> Tabela Séries </p>

```
curl https://webservice-jogos-henryhiraki22.c9users.io/buscaSeries/1 <- retorna via ID.

curl https://webservice-jogos-henryhiraki22.c9users.io/listaSerie <- retorna todos as series.

```

<p> Tabela Livros </p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/buscaLivros/1 <- retorna via ID.
curl https://webservice-jogos-henryhiraki22.c9users.io/listaLivros <- retorna todos as series.

```

<h3>Método POST</h3>

<p>Insere dados na tabela, via curl</p>

<p>Tabela Jogos</p>

```
curl https://webservice-jogos-henryhiraki22.c9users.io/insereJogo / -v / X POST / -H 'content-type:application/json' / -d '{"nome":"FIFA","valor":299.99, "plataforma":"Playstation", "genero":"SOCCER"}' 

```

<p>Tabela Usuários</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/insereUsuario / -v / -X POST / -H 'content-type:application/json' / -d '{"nome":"Henry","login":"Hirak","senha":"123"}'

```
<p>Tabela Fimes</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/insereFilme / -v / X POST / -H 'content-type:application/json' / -d '{"nome":"StarWars","valor":89.99,"genero":"Fiction"}'
```
<p> Tabela Séries </p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/insereSerie / -v / X POST / -H 'content-type:application/json' / -d '{"nome":"BreakingBad","valor":89.99,"genero":"Action"}'
```

<p> Tabela Livros </p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/insereLivro / -v / X POST / -H 'content-type:application/json' / -d '{"nome":"Teste","valor":89.99,"genero":"Fiction"}'

```


<h3>Método PUT</h3>

<p>Atualiza os dados via curl por ID.</p>


<p>Tabela Jogos</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaJogo / -v / -X PUT / -H 'content-type:application/json' / -d '{"id":8,"nome":"FORZA-6","valor":50.00,"plataforma":"XBOX","genero":"Corrida"}'

```
<p>Tabela Usuários</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaUsuario / -v / -X PUT / -H 'content-type:application/json' / -d '{"nome":"Henry","login":"Hiraki","senha":"123", "id":2}'
```
<p>Tabela Fimes</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaFilme / -v / -X PUT / -H 'content-type:application/json' / -d '{"id":3,"nome":"cIVIL WAR","valor":50.00,"genero":"ACTION"}'
```
<p> Tabela Séries </p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaSerie / -v / -X PUT / -H 'content-type:application/json' / -d '{"id":1,"nome":"mrRobot","valor":50.00,"genero":"ACTION"}'

```

<p> Tabela Livros </p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaLivro / -v / -X PUT / -H 'content-type:application/json' / -d '{"id":2,"nome":"mrRobot","valor":50.00,"genero":"ACTION"}'

```

<h3>Método DELETE</h3>

<p> Deleta dados da tabela via curl</p>

<p>Tabela Jogos</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaJogo / -v / -X PUT / -H 'content-type:application/json' / -d '{"id":8,"nome":"FORZA-6","valor":50.00,"plataforma":"XBOX","genero":"Corrida"}'

```
<p>Tabela Usuários</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/atualizaUsuario / -v / -X PUT / -H 'content-type:application/json' / -d '{"nome":"Henry","login":"Hiraki","senha":"123", "id":2}'
```
<p>Tabela Fimes</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/deletaFilme / -v / -X DELETE / -H 'content-type:application/json' / -d '{"id":1}'
```
<p> Tabela Séries </p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/deletaSerie / -v / -X DELETE / -H 'content-type:application/json' / -d '{"id":2}'
```

<p> Tabela Livros </p>
```

curl https://webservice-jogos-henryhiraki22.c9users.io/deletaLivro / -v / -X DELETE / -H 'content-type:application/json' / -d '{"id":2}'
```

<h2>TOKEN</h2>

<p>Utilizamos o JWT, verificamos se o login e a senha , caso estiver certo ele gera um token. Fizemos com intenção de 
simular uma compra, contudo infelizmente, não foi possivel.</p>

<p>Método autenticar</p>

```
curl https://webservice-jogos-henryhiraki22.c9users.io/autenticar / -v / -X POST / -H 'content-type:application/json' / -d '{"login":"Hirak","senha":"123"}'

```
<p>Método Autorizar</p>
```
curl https://webservice-jogos-henryhiraki22.c9users.io/autorizar / -H "Content-Type:application/json" -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IkhlbnJ5Ig.D3my9luWymgbRLxY7dOP-MrGek2SbpLm6AwayyuPd_E" -d '{ "login" : "Hirak","senha":"123" }'

```
<h1> Desenvolvido, para estudos.</h1>
<p>Obrigado a todos os integrantes da equipe.</p>



