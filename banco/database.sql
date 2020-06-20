--Data Base Name: DB_cidade_regiao
Create table tb_regiao (
 id_regiao Serial NOT NULL,
 nome Varchar(50) NOT NULL,
 constraint pk_regiao primary key (id_regiao));
 
Create table tb_cidade (
 id_cidade Serial NOT NULL,
 id_regiao Serial NOT NULL,
 nome Varchar(100) NOT NULL,
 populacao Integer NOT NULL,
 constraint pk_cidade primary key (id_cidade),
 constraint fk_regiao foreign key (id_regiao) references tb_regiao(id_regiao));

Create table tb_usuario (
 id_usuario Serial NOT NULL,
 usuario Varchar(100) UNIQUE NOT NULL,
 senha Char(8) NOT NULL,
 constraint pk_usuario primary key (id_usuario));

SELECT * FROM tb_regiao
SELECT * FROM tb_cidade
SELECT * FROM tb_usuario

INSERT INTO tb_regiao(id_regiao, nome) VALUES(1, 'Norte');
INSERT INTO tb_regiao(id_regiao, nome) VALUES(2, 'Sul');
INSERT INTO tb_regiao(id_regiao, nome) VALUES(3, 'Leste');
INSERT INTO tb_regiao(id_regiao, nome) VALUES(4, 'Oeste');

INSERT INTO tb_cidade(id_cidade, id_regiao, nome, populacao) VALUES(1, 1, 'Passo Fundo', 200000);
INSERT INTO tb_cidade(id_cidade, id_regiao, nome, populacao) VALUES(2, 1, 'Carazinho', 100000);
INSERT INTO tb_cidade(id_cidade, id_regiao, nome, populacao) VALUES(3, 2, 'erechim', 5000);

INSERT INTO tb_usuario(id_usuario, usuario, senha) VALUES(1, 'teste', '12345678');