<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Keyboard\Keyboard;
use File;


class TelegramBotController extends Controller
{
    //
    public function botReset()
    {
        $response = Telegram::removeWebhook();
        return response()->json($response);
    }
    public function botAdd()
    {
        $response = Telegram::setWebhook(['url' => "https://bot.michelmelo.pt/api/bot/getupdates"]);
        $result = array($response);
        return response()->json($result);
    }
    public function botStatus()
    {
        $activity = Telegram::getWebhookInfo();
        $result = array($activity);
        return response()->json($result);
    }

    public function getChatMembersCount($id)
    {
        $params = array();
        $params['chat_id'] = $id;
        $result = Telegram::getChatMembersCount($params);
        return $result;
    }
    public function SendMensagens($message, $admin = false)
    {


        if (str_contains($message->text, ['#canaldothiago', 'canaldothiago'])) {
            try {

                $keyboard = Keyboard::make()
                    ->inline()
                    ->row(
                        Keyboard::inlineButton(['text' => json_decode('"\ud83c\udf0f"') . ' Família VnT - Portugal', 'url' => 'https://www.youtube.com/channel/UCdMlJMd7VJUMeQJPlBpCaqg'])
                    );

                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "Aos novos membros Visite o Canal do Thiago e veja os videos, se tiver duvidas posta aqui no grupo. Algum Admin ou um membro vai poder ajudar.",
                    'reply_markup' => $keyboard
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        if (str_contains($message->text, ['#promohoteis', 'promohoteis'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "Promoção de hoteis e hosteis em libos e porto #promo https://pt.vinhosdeluxo.com/booking/vnt-grupo"
                ]);
                // \Log::debug("teste " . $teste);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        if (str_contains($message->text, ['linkdogrupo', '#linkdogrupo', 'linkdogrupo'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "Segue o link do grupo https://cutt.ly/VNT_PORTUGAL"
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        //nif
        if (str_contains($message->text, ['O QUE É NIF', '#OQUEÉNIF', 'dica001', '#dica001', '#nif'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "1. O QUE É NIF?\n\n\r• O NIF (também chamado de número de contribuinte) equivale ao CPF do Brasil. Portanto, ele é essencial para qualquer transação: desde a entrega de seus móveis, ao contrato do apartamento e ligação dos serviços, como água e luz. É um documento emitido por um órgão chamado Finanças (AT – Autoridade Tributária e Aduaneira) e também obtido nas Lojas do Cidadão."
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        //nif
        //niss
        if (str_contains($message->text, ['O QUE É NISS', '#OQUEÉNISS', 'dica002', '#dica002', '#niss'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "2. O QUE É NISS?\n\n\r• NISS – Número de Identificação de Segurança Social. A entidade empregadora é responsável por comunicar aos serviços da Segurança Social a admissão de novos funcionários, ou seja, em tese você fornece os documentos para o seu empregador e ele providencia o seu cadastro junto a Segurança Social.\n\rDocumentos que você vai precisar:\r\n• Passaporte + cópia;\r• Comprovante de endereço + cópia (tem que ser no teu nome, obrigatoriamente! Normalmente, é levado o contrato de arrendamento, se você não tiver tem que ir até a Junta da Freguesia e solicitar uma certidão que vai dizer que você realmente reside no endereço informado); \r\r• NIF + cópia.;\r• Contrato de trabalho + cópia;\r• Cópia do documento do representante da empresa."
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        //niss
        //niss
        if (str_contains($message->text, ['O QUE É O NÚMERO DE UTENTE', '#OQUEÉONÚMERODEUTENTE', 'dica003', '#dica003', '#UTENTE'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "🚑 3. O QUE É O NÚMERO DE UTENTE?\n\n\r• O número do utente é o seu número de registro no Serviço Nacional de Saúde (SNS), e através dele é que podemos usufruir da saúde pública.\n\r• Para solicitar o seu número de utente você precisará comparecer ao centro de saúde da região onde você vive (sua freguesia), munido de NIF, comprovativo de morada (aquele emitido pela junta de freguesia) e um documento de identificação (cartão de residência, passaporte, BI) e solicitar seu número de utente no balcão.\n\r• Essa solicitação não tem custo algum e eles te entregarão um comprovante em papel onde constam os dados cadastrados e o seu número de utente.\n\rObs.:  Utente normalmente NÃO é disponibilizado para turista."
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        //niss
        //niss
        if (str_contains($message->text, ['O QUE É PB4', '#OQUEÉPB4', 'dica004', '#dica004', '#PB4'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "🏥 4. O QUE É PB4?\n\n\r• CDAM – Certificado de Direito à Assistência Médica – também conhecido como PB-4 é o documento, emitido pelo Núcleo Estadual do Ministério da Saúde, garante acesso (quase) gratuito à assistência médica nos sistemas da rede pública de saúde em Cabo Verde e em Portugal.\n\r• Documentos necessários (originais e cópias): Passaporte, RG, CPF e endereço aonde vai ficar em Portugal.\n\r\n\rOBS: O RG não pode ter mais de 10 anos de expedição. Caso tenha, terá que renovar antes.\n\r• Validade: 1 ano. ( Dica: Para renovar por mais um ano deixe uma procuração no Brasil).\n\r• Autenticação (Reconhecer firma): Com o documento em mãos, dirigir-se ao cartório para fazer o reconhecimento de firma da assinatura da chefe do Serviço de Gestão Administrativa. O endereço do cartório será indicado pelos funcionários do Ministério da Saúde.\n\r• Apostila: Após autenticar também apostile o documento para ser reconhecido na Europa.\n\rOBS.: O documento é feito por adulto. O pai ou a mãe pode também incluir os filhos como dependentes.\n\r\n\rPara mais informações consulte:\n\rhttp://sna.saude.gov.br/cdam/index2.cfm"
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }

        if (str_contains($message->text, ['POSSO COMPRAR MOTO OU CARRO, MESMO SENDO TURISTA?', '#POSSOCOMPRARMOTOOUCARRO', 'dica007', '#dica007', '#POSSOCOMPRARMOTOOUCARRO'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "🚘  7. POSSO COMPRAR MOTO OU CARRO, MESMO SENDO TURISTA?\n\n\r• Para comprar um carro em Portugal, basta ter o passaporte em dia, possuir um NIF, e claro, carteira de motorista do Brasil válida.\n\r• Um outro requisito obrigatório em Portugal é o seguro do carro, diferente do Brasil, NÃO SE PODE CONDUZIR UM CARRO SEM SEGURO, geralmente a periodicidade dos seguros são de 03, 06 e 12 meses. Por não possuir residência, algumas seguradoras podem não querer fazer o seguro."
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }

        if (str_contains($message->text, ['COMO E QUANDO POSSO DAR ENTRADA EM MEU PEDIDO DE RESIDÊNCIA?', '#COMOEQUANDOPOSSODARENTRADAEMMEUPEDIDODERESIDÊNCIA', 'dica008', '#dica008', '#COMOEQUANDOPOSSODARENTRADAEMMEUPEDIDODERESIDÊNCIA'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "🏘 8. COMO E QUANDO POSSO DAR ENTRADA EM MEU PEDIDO DE RESIDÊNCIA?\n\n\rApós reunir a princípio os seguintes documentos:\n\r\r• Contrato de trabalho ou Atividade independente ( recebo verde/empresa).\n\r• Inscrição na Segurança Social (NISS);\n\r• Contribuinte (NIF);\n\r• Comprovante de moradia.\n\r• Comprovante de vencimentos(holerite)."
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }

        if (str_contains($message->text, ['🚗 9. POSSO DIRIGIR COM MINHA CARTEIRA DO BRASIL?', '#POSSODIRIGIRCOMMINHACARTEIRADOBRASIL', 'dica009', '#dica009', '#POSSODIRIGIRCOMMINHACARTEIRADOBRASIL'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "🚗 9. POSSO DIRIGIR COM MINHA CARTEIRA DO BRASIL?\n\n\rSim, apenas durante o período do visto.\n\rImportante: Normalmente este período é de apenas 3 meses e no máximo 6 meses -- se o visto for renovado."
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        if (str_contains($message->text, ['#bemvindo'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->chat->id,
                    'parse_mode' => 'HTML',
                    'text' => "*Sejam bem-vindos os novos integrantes!*\r\r\n\rLeiam as regras e usem BASTANTE a ferramenta de busca para ver o histórico do grupo. Evitem também em dizer as datas de viagem e em chamar qualquer membro no PV sem antes pedir autorização no grupo.\n\r\r\r\rAbraços😎👍 \n\r\r\r\rhttps://telegra.ph/trhrth-11-06"
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        if (str_contains($message->text, ['#bemvindobot'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => -1001339033433,
                    'parse_mode' => 'HTML',
                    'text' => "DICA:\n\n\n\n\n\r   Leiam as regras e usem BASTANTE a ferramenta de busca para ver o histórico do grupo. Evitem também em dizer as datas de viagem e em chamar qualquer membro no PV sem antes pedir autorização no grupo.\n\r\r\r\rAbraços😎👍 \n\r\r\r\rhttps://telegra.ph/trhrth-11-06"
                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        if (str_contains($message->text, ['#canaldothiagobot'])) {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => -1001339033433,
                    'parse_mode' => 'HTML',
                    'text' => "Aos novos membros Visite o Canal do Thiago e veja os videos, se tiver duvidas posta aqui no grupo. Algum Admin ou um membro vai poder ajudar.",


                ]);
            } catch (Exception $e) {
                return "NOok-";
            }
        }
        //niss
    }

    public function enquete()
    {
        $keyboard = Keyboard::make()->forceReply()
            ->row(
                Keyboard::inlineButton(['text' => 'Button 1', 'callback_data' => 'your_callback_data']),
                Keyboard::inlineButton(['text' => 'Button 2', 'callback_data' => 'your_callback_data'])
            );

        Telegram::sendMessage([
            'chat_id' => 632871515,
            'text' => "Hello world!",
            'reply_markup' => $keyboard
        ]);
    }

    public function updatedActivity(Request $request)
    {
        \Log::debug(":::::::::::::: updatedActivity :::::::::::::");

        try {
            // $response = Telegram::removeWebhook();
            \Log::debug(":::::::::::::: getWebhookInfo ok :::::::::::::");
            $updates = Telegram::getWebhookInfo();
        } catch (Exception $e) {
            \Log::debug(":::::::::::::: getWebhookInfo Nook :::::::::::::");
            return false;
        }

        try {
            \Log::debug(":::::::::::::: commandsHandler  ok :::::::::::::");
            $txtCommands = Telegram::commandsHandler(true);
        } catch (Exception $e) {
            \Log::debug(":::::::::::::: commandsHandler Nook :::::::::::::");
            return false;
        }

        try {
            \Log::debug(":::::::::::::: getMessage ok :::::::::::::");
            $message = $txtCommands->getMessage();
        } catch (Exception $e) {
            \Log::debug(":::::::::::::: getMessage  Nook:::::::::::::");
            return false;
        }


        if ($message->from->id == '632871515') {
            $this->SendMensagens($message, true);
            if (str_contains($message->text, ['#enquete'])) {
                $this->enquete();
            }
            if (str_contains($message->text, ['#novovideo'])) {
                $link = $this->getVideoUrl();
                try {
                    $teste = Telegram::sendMessage([
                        'chat_id' => 632871515,
                        'parse_mode' => 'HTML',
                        'text' => "link: " . $link

                    ]);
                } catch (Exception $e) {
                    \Log::debug("chat: " . $e);
                }
            }
        }
        // //634543446 tiago
        // //698495332 ale
        // //852445648 eduardo
        // //888325737 carlos
        // //684195623 nuno
        // //654416786 Layy
        // //305708785 adison

        if (
            $message->from->id == '634543446' or $message->from->id == "698495332"
            or $message->from->id == "852445648"
            or $message->from->id == '888325737'
            or $message->from->id == "684195623"
            or $message->from->id == "654416786"
            or $message->from->id == "305708785"
        ) {
            $this->SendMensagens($message, true);
        }


        \Log::debug(":::::::::::::: informacoes :::::::::::::");
        \Log::debug("message: " . print_r($message, true));
        $new_chat_participant = isset($message->new_chat_participant) ? 'true' : 'false';



        if ($new_chat_participant == 'true') {
            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => 632871515,
                    'parse_mode' => 'HTML',
                    'text' => "new_chat_participant: " . $new_chat_participant

                ]);
            } catch (Exception $e) {
                \Log::debug("chat: " . $e);
            }

            \Log::debug("new_chat_participant");
            \Log::debug("message: " . print_r($message->new_chat_participant, true));

            try {
                $teste = Telegram::sendMessage([
                    'chat_id' => $message->from->id,
                    'parse_mode' => 'HTML',
                    'text' => "Sejam bem-vindos os novos integrantes!\r\r\r\rLeiam as regras e usem BASTANTE a ferramenta de busca para ver o histórico do grupo. Evitem também em dizer as datas de viagem e em chamar qualquer membro no PV sem antes pedir autorização no grupo.\n\r\r\r\rAbraços😎👍 \n\r\r\r\rhttps://telegra.ph/trhrth-11-06"

                ]);
            } catch (Exception $e) {
                \Log::debug("teste " . $e);
                return "NOok-";
            }
        }
        return 'ok';
    }

    public function getUrl()
    {
        $chat_text_url = 'vnt';
        $html = file_get_html('https://www.youtube.com/results?search_query=' . str_replace(' ', '+', $chat_text_url));
        return $html;
    }
    public function getUrlDownload()
    {
        $chat_text_url = getMessage_textDownload();
        $html = file_get_html('https://www.youtube.com/results?search_query=' . str_replace(' ', '+', $chat_text_url));
        return $html;
    }
    public function getVideoUrl()
    {
        $ol = $this->getUrl()->find('h3.yt-lockup-title', 0);
        $a = $ol->find('a.yt-uix-tile-link', 0);
        $video_url = $a->href;
        $video_youtube = 'https://youtube.com' . $video_url;
        return $video_youtube;
    }
    public function getVideoUrlDownload()
    {
        $ol = getUrlDownload()->find('h3.yt-lockup-title', 0);
        $a = $ol->find('a.yt-uix-tile-link', 0);
        $video_url = $a->href;
        $video_youtube = 'https://www.youtube.com' . $video_url;
        return $video_youtube;
    }
}
