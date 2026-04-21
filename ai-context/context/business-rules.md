# Regras de Negócio e Domínio (business-rules.md)

**Descrição:** 
Anotações estritas do core business da mecânica interna do sistema **FibroCare**. Qualquer implementação de lógica, modelagem de banco ou validação de formulários devera submeter-se a estas regras.

**1. Escala Universal de Sintomas:**
O pilar principal do acompanhamento da severidade da condição de dor e fadiga no paciente.
- Campo: `intensidade` em Sintomas.
- Escala Absoluta: Apenas valores interios numéricos entre **1** (Mínimo, tolerável) e **10** (Severo, debilitante).

**2. Relacionamento Pai-Filho (Pacientes como Centro):**
- A Entidade Mãe obrigatória no sistema é **Pacientes**.
- É impossível existir um "Sintoma Órfão" e "Tratamento Órfão". Tudo exige a vinculação com uma FK (`paciente_id`). 
- Deleção: Excluir um paciente obriga a exclusão permanente paralela de todos os sintomas e tratamentos que lhe outorgam pertencimento (aplicado atrávez de `CONSTRAINT ... ON DELETE CASCADE` e reforçado no Backend).

**3. Métricas Dinâmicas e KPIs de Sucesso:**
- A **Média de Dor** geral exibe um panorama macro do nível de controle da doença na base de dados global na aba Dashboard.
- O **Prontuário Individual** cruza o perfil do paciente trazendo listagem visual customizada do que aflinge _apenas_ aquele paciente. Modelagens que misturem na tela pacientes diferentes e sintomas cruzados representam falha crítica na estrutura de regra de negócios em saúde (LGPD/LGP em projetos afins).