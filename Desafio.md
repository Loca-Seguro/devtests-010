# Desenvolvedor Loca Seguro :: Desafios Técnicos

Abaixo você irá encontrar alguns desafios técnicos como parte do processo seletivo para a posição de *Desenvolvedor Pleno*.
Os desafios estão dividos em 3 categorias:
* Refatoração
* Implementação
* Arquitetura

## Refatoração

Este desafio consiste na refatoração de um trecho de código para que não esteja ferindo nenhum dos princípios *SOLID*
O código é exibido em pseudocódigo, pois é um desafio agnóstico de plataforma e tecnologia. Sinta-se à vontade para refatorar  
utilizando o mesmo padrão ou usando alguma das linguagens aceitas no desafio (lista no final).

### Desafio 01

Permita a adição de novos métodos de pagamento e canais de notificação com baixo acoplamento.
```pseudocode
class ReportService:
    def generate_report(data, type):
        if type == "pdf":
            report = generate_pdf(data)
        elif type == "excel":
            report = generate_excel(data)
        else:
            raise Exception("Unsupported type")
        self.save_to_file(report)
        self.send_email(report)

    def save_to_file(report):
        # lógica para salvar arquivo no disco
        pass

    def send_email(report):
        # lógica para enviar o relatório por e-mail
        pass
```
---

### Desafio 02

Refatore o código para que novos dispositivos possam ser monitorados sem alterar `DeviceMonitor`.  
```pseudocode
class DeviceMonitor:
    def check_status(devices):
        for d in devices:
            if d.type == "sensor":
                if d.battery_level < 20:
                    alert("Battery low on sensor: " + d.id)
            elif d.type == "camera":
                if not d.is_streaming():
                    alert("Camera offline: " + d.id)
            elif d.type == "door_lock":
                if d.last_heartbeat > 10 minutes:
                    alert("Door lock unresponsive: " + d.id)

    def alert(message):
        print("ALERT: " + message)
```
---

## Implementação

O desafio de implementação irá te apresentar um problema a ser resolvido.
Utilize comentários para explicar qual foi a ideia utilizada para a construção do algoritmo.

### Desafio 01

Dado um array de palavras, agrupe todas as palavras que forem anagramas entre si.  
*Anagramas* são palavras formadas pelas mesmas letras em ordem diferentes.  

**Exemplo:**  
Entrada: `["bat", "tab", "cat", "act", "tac"]`  
Saída: `[["bat", "tab"], ["cat", "act", "tac"]]`  

**Casos de testes**  
```
Entrada: ["listen", "silent", "enlist", "google", "gooleg"]
Saída: [["listen", "silent", "enlist"], ["google", "gooleg"]]

Entrada: ["abc", "def", "cab"]
Saída: [["abc", "cab"], ["def"]]
```
---

### Desafio 02

Implemente uma estrutura de fila no modelo **FIFO**, que contenha os seguintes métodos:  
**add** -> Adiciona um elemento na fila  
**get** -> Retorna o próximo da fila  
**print** -> Retorna uma string com o status da fila  

```psedocode
f = Fila()
f.add("josé")
f.add("joão")
f.print()
"['josé', 'joão']"
f.add("maria")
f.get()
"'josé'"
f.print()
"['joão', 'maria']"
```
---


## Arquitetura

O desafio de arquitetura irá te apresentar um problema onde será preciso desenhar a arquitetura da sua solução. Utilize qualquer  
ferramenta de sua preferência para desenhar a sua solução e inclua uma explicação textual sobre suas escolhas.

### Desafio 01

Implemente um serviço de notificação que envie mensagens via e-mail, SMS e push.

**Requisitos**  
- O sistema deve permitir a inclusão de novos canais de notificação sem a necessidade de alterar a lógica principal da aplicação.
- O serviço será utilizado por vários sistemas da companhia, e precisa manter um track record de quais mensagens foram enviadas por qual sistema.
---

## Entregas

Você deverá criar uma branch seguindo o padrão de nomenclatura `challenge/<seu_nome>` e enviar o PR como marco da sua entrega.  
**Refatoração**  
Suba um arquivo com o código refatorado, pode ser em pseudocógido ou umas das linguagens aceitas no desafio.  
**Implementação**  
Suba o(s) arquivo(s) ou uma pasta com o nome do desafio.  
**Arquitetura**  
Inclua uma imagem e um arquivo explicativo sobre suas decisões de arquitetura.

**Linguagens utilizadas**  
Para a entrega dos desafios, as seguintes linguagens de programação serão aceitas:
* PHP
* Python
* Javascript
* Typescript
