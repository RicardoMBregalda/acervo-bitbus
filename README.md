# Acervo Bitbus
Nomes: Lorenzo Menegotto e Ricardo Bregalda

## Escopo

Acervo do Bit Bus.
## Objetivo

Desenvolver um sistema integrado de gestão dinâmico e interativo para o Bit Bus, um ônibus científico-cultural itinerante, que visa facilitar e otimizar a gestão e divulgação de conhecimento em ciência e tecnologia. Este sistema permitirá a gestão eficaz de um acervo tecnológico variado, organização de visitas itinerantes, realização de oficinas educativas, e gerenciamento de doações, tudo isso apoiado por uma solução digital que integra coleta e análise de feedback dos visitantes através da API do Google Forms.

## Backlog
- Gerenciamento de Acervo Tecnológico
- Registro de Participantes
- Agendamento de Visitas Itinerantes
- Gestão de Oficinas
- Feedback dos Visitantes
- Gerenciamento de Doações

## Histórias
### Gerenciamento de Acervo Tecnológico
Como administrador quero poder cadastrar e editar informações de artefatos tecnológicos, para que o acervo seja facilmente acessado e atualizado com informações detalhadas como processadores, memórias, periféricos, discos removíveis, softwares e placas.
### Registro de Participantes
Como administrador quero registrar todos os visitantes que participam das atividades,
Para que possamos manter um registro detalhado de quem foi impactado pelo projeto e melhorar o engajamento.
### Agendamento de Visitas Itinerantes
Como administrador quero agendar, visualizar e modificar os detalhes das visitas itinerantes,
Para que possa organizar eficientemente o roteiro do ônibus, incluindo local, período, e pessoa responsável.
### Gestão de Oficinas
Como administrador quero programar oficinas, incluindo detalhes sobre palestrantes, resumos, título, local, data e hora, para que as informações sejam claras para todos os participantes e facilitar a logística dos eventos.
### Feedback dos Visitantes
Como administrador quero coletar feedback dos visitantes através de formulários do Google Forms após cada visita ou oficina, para que possamos avaliar e melhorar continuamente a experiência dos visitantes.
### Gerenciamento de Doações
Como administrador quero registrar e gerenciar as doações recebidas, seja em dinheiro ou em forma de equipamentos, para que o suporte financeiro e material seja adequadamente documentado e gerenciado.

## Domínio

![Diagrama de classe de domínio](https://i.ibb.co/G2GRs3g/Diagrama-em-branco-2.jpg)



## Testes

- Doações funcionais: doações de dinheiro serem registradas, doações de items serem registradas e cadastrarem o item no acervo
- Cadastro de item: permitir cadastrar um item no acervo, com todos os detalhes necessários com sucesso
- Editar e/ou remover um item: processo fluir sem erros e salvar alterações ou excluir o item selecionado
- Registrar participantes de uma visita
- Participante receber um formulário de feedback e sistema cadastrar feedbacks dos visitantes, relacionando com a visita
- Cadastro de oficinas e participantes das oficinas
- Agendamento de visitas

## Arquitetura

- Backend: Laravel 11
- Frontend: Vue.js 3


# Sprint 1

- Gerenciamento de Acervo Tecnológico
- Agendamento de Visitas Itinerantes
- Registro de Participantes


# Sprint 2

- Gestão de Oficinas
- Feedback dos Visitantes
- Gerenciamento de Doações
