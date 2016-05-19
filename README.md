
     ,-----.,--.                  ,--. ,---.   ,--.,------.  ,------.
    '  .--./|  | ,---. ,--.,--. ,-|  || o   \  |  ||  .-.  \ |  .---'
    |  |    |  || .-. ||  ||  |' .-. |`..'  |  |  ||  |  \  :|  `--, 
    '  '--'\|  |' '-' ''  ''  '\ `-' | .'  /   |  ||  '--'  /|  `---.
     `-----'`--' `---'  `----'  `---'  `--'    `--'`-------' `------'
    ----------------------------------------------------------------- 


Hi there! Welcome to Cloud9 IDE!

To get you started, we have created a small hello world application.

1) Open the hello-world.php file

2) Follow the run instructions in the file's comments

3) If you want to look at the Apache logs, check out ~/lib/apache2/log

And that's all there is to it! Just have fun. Go ahead and edit the code, 
or add new files. It's all up to you! 

Happy coding!
The Cloud9 IDE team


## Support & Documentation

Visit http://docs.c9.io for support, or to learn more about using Cloud9 IDE. 
To watch some training videos, visit http://www.youtube.com/user/c9ide

(sem ID):
curl https://webservice-jogos-henryhiraki22.c9users.io/insereJogo / -v / -X POST / -H 'content-type:application/json' / -d '{"nome":"DarkSouls","valor":250.99,"plataforma":"Playstation","genero":"FDP"}'
-----------------------------------------------------------------------------
(com ID):

curl https://webservice-jogos-henryhiraki22.c9users.io/insereJogo / -v / -X POST / -H 'content-type:application/json' / -d '{"id":1,"nome":"DarkSouls","valor":250.99,"plataforma":"Playstation4","genero":"FDSP"}'

------------------------------------------------------------------------------

para excluir via curl com id:

curl https://webservice-jogos-henryhiraki22.c9users.io/deletaJogo / -v / -X DELETE / -H 'content-type:application/json' / -d '{"id":1}'
------------------------------------------------------------------------------

para buscar via curl: 

curl https://webservice-jogos-henryhiraki22.c9users.io/buscaJogo/4;

