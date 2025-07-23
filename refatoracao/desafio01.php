<?php


class ReportService
{
    public function __construct(public ReportGenerator $reportGenerator, public DispatchService $dispatchService
    )
    {
    }

    public function generate_report($data, $type): void
    {
        //gerando o arquivo de forma genérica
        $report = $this->generate_archive($data, $type);
        $this->save_to_file($report);

        //disparando as notificaçoes
        $this->dispatchReportNotifications($report);
    }

    private function generate_archive($data, $type): Report
    {
        //Seria uma classe que teria a logica para todos os tipos de arquivos pdf,excel, etc ...
        //aqui ele teria a validaçao de type e retornaria um throw caso o type fosse invalido
        return $this->reportGenerator->generate($data, $type);
    }

    private function dispatchReportNotifications(Report $report)
    {
        //dentro dessa classe estariam todos os disparos relacionados a report com SMS, MAIL, etc ...
        //esse dispatchService seria um serviço para disparar tipos de envios no sistema

        $this->dispatchService ->dispatchReportNotification($report);
    }

    private function save_to_file(Report $report): void
    {
        // lógica para salvar arquivo no disco
    }
}
