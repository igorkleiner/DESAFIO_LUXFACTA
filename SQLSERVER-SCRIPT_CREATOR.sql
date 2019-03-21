

/****** Object:  Database [desafio_luxfacta_teste_criação]    Script Date: 21/03/2019 14:48:30 ******/
CREATE DATABASE [desafio_luxfacta_teste_criação]

GO
-- ===========================================================================


USE [desafio_luxfacta_teste_criação]
GO

/****** Object:  Table [dbo].[perfil]    Script Date: 21/03/2019 14:50:08 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[perfil](
	[per_id]   [int] IDENTITY(1,1) NOT NULL,
	[per_nome] [varchar](45) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[per_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO


INSERT INTO perfil (per_nome) VALUES ('Guest');
INSERT INTO perfil (per_nome) VALUES ('Cliente');
INSERT INTO perfil (per_nome) VALUES ('Funcionario');
INSERT INTO perfil (per_nome) VALUES ('Gerente');
INSERT INTO perfil (per_nome) VALUES ('Dono');

-- ===========================================================================


USE [desafio_luxfacta_teste_criação]
GO

/****** Object:  Table [dbo].[usuario]    Script Date: 21/03/2019 14:51:51 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[usuario](
	[usu_id]       [int] IDENTITY(1,1) NOT NULL,
	[usu_nome]     [varchar](45)       NOT NULL,
	[per_id]       [int]               NOT NULL,
	[usu_login]    [varchar](10)       NULL,
	[usu_password] [varchar](8)        NULL,
PRIMARY KEY CLUSTERED 
(
	[usu_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [usu_login]
GO

ALTER TABLE [dbo].[usuario] ADD  DEFAULT (NULL) FOR [usu_password]
GO

ALTER TABLE [dbo].[usuario]  WITH CHECK ADD  CONSTRAINT [per_id] FOREIGN KEY([per_id])
REFERENCES [dbo].[perfil] ([per_id])
GO

ALTER TABLE [dbo].[usuario] CHECK CONSTRAINT [per_id]
GO


INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Guest',1,'guest','guest');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Igor',5,'igor','1234');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Gritzko',4,'leco','4321');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Fulano',3,'aaaa','1111');
INSERT INTO usuario (usu_nome,per_id,usu_login,usu_password) VALUES ('Ciclano',2,'bbbb','2222');


-- ===========================================================================


USE [desafio_luxfacta_teste_criação]
GO

/****** Object:  Table [dbo].[produto]    Script Date: 21/03/2019 14:53:26 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[produto](
	[prod_id]    [int] IDENTITY(1,1) NOT NULL,
	[prod_nome]  [varchar](45)       NOT NULL,
	[prod_preco] [float]             NULL,
	[prod_qtd]   [float]             NULL,
PRIMARY KEY CLUSTERED 
(
	[prod_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[produto] ADD  DEFAULT (NULL) FOR [prod_preco]
GO

ALTER TABLE [dbo].[produto] ADD  DEFAULT (NULL) FOR [prod_qtd]
GO



-- ===========================================================================


USE [desafio_luxfacta_teste_criação]
GO

/****** Object:  Table [dbo].[timer]    Script Date: 21/03/2019 14:54:16 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[timer](
	[timer_id]  [int] IDENTITY(1,1) NOT NULL,
	[usu_id]    [int]               NOT NULL,
	[data]      [date]              NOT NULL,
	[entrada_1] [datetime2](7)      NULL,
	[saida_1]   [datetime2](7)      NULL,
	[entrada_2] [datetime2](7)      NULL,
	[saida_2]   [datetime2](7)      NULL,
	[entrada_3] [datetime2](7)      NULL,
	[saida_3]   [datetime2](7)      NULL,
	[entrada_4] [datetime2](7)      NULL,
	[saida_4]   [datetime2](7)      NULL,
	[entrada_5] [datetime2](7)      NULL,
	[saida_5]   [datetime2](7)      NULL,
 CONSTRAINT [Pk_Timer] PRIMARY KEY CLUSTERED (	[timer_id] ASC)
 WITH (
 	PAD_INDEX = OFF,
 	STATISTICS_NORECOMPUTE = OFF,
 	IGNORE_DUP_KEY = OFF,
 	ALLOW_ROW_LOCKS = ON,
 	ALLOW_PAGE_LOCKS = ON
) ON [PRIMARY] )
GO

ALTER TABLE [dbo].[timer]  WITH CHECK ADD  CONSTRAINT [Fk_Timer_Usuario] FOREIGN KEY([usu_id])
REFERENCES [dbo].[usuario] ([usu_id])
GO

ALTER TABLE [dbo].[timer] CHECK CONSTRAINT [Fk_Timer_Usuario]
GO


-- ===========================================================================
-- DBCC CHECKIDENT ('timer', RESEED, 32)
-- GO