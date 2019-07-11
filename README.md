Both folders must have a database;
App Lista Tarefas database -
  create table tb_status(
	id int not null primary key auto_increment,
    status varchar(25) not null
  );

  insert into tb_status(status)values('pendente');
  insert into tb_status(status)values('realizado');

  create table tb_tarefas(
    id int not null primary key auto_increment,
      id_status int not null default 1,
      foreign key(id_status) references tb_status(id),
    tarefa text not null,
      data_cadastrado datetime not null default current_timestamp
  )
  
CRUD with Ajax and PHP database -
  create table comments(
    id int(11) not null primary key auto_increment,
    name varchar(255) not null,
    comment text not null
  )

The database connection are individual, so you have to change it to run correctly.
