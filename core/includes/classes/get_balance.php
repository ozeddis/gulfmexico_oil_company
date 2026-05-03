<?php 
    class GetBalance {
        private $conn; //set instance

        public function __construct($connection){
            $this->conn = $connection; //PDO object
        }

        public function getBalance($account_id, $coin) {
            // Initialize balance variables
            $amount1 = 0;
            $amount2 = 0;
            $credit = 'credit';
            $debit = 'debit';
        
            // Query for credit balance
            $query = $this->conn->prepare("SELECT amount FROM crypto WHERE internal_wallet = ? AND coin = ? AND status = ?");
            $query->execute([$account_id, $coin, $credit]);
            
            if ($query->rowCount() > 0) {
                while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                    $amount1 += $result['amount'];
                }
            }
        
            // Query for debit balance
            $query = $this->conn->prepare("SELECT amount FROM crypto WHERE internal_wallet = ? AND coin = ? AND status = ?");
            $query->execute([$account_id, $coin, $debit]);
            
            if ($query->rowCount() > 0) {
                while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
                    $amount2 += $result['amount'];
                }
            }
        
            // Calculate net balance
            $balance = $amount1 - $amount2;
            return round($balance,4);
        }
        

        public function getCryptoValue($coin, $currency, $baseAmount) {
            $link = "https://min-api.cryptocompare.com/data/price?fsym=$coin&tsyms=$currency";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
            $result = curl_exec($ch);
            curl_close($ch);
        
            // Decode JSON response and check for errors
            $result = json_decode($result, true);
        
            if (json_last_error() !== JSON_ERROR_NONE || !isset($result[$currency])) {
                // Handle API or decoding error
                return false;
            }
        
            // Conversion rate for the coin amount to another currency value(e.g., BTC to USD rate)
            $conversionRate = $result[$currency];
        
            $cryptoAmount = round($baseAmount * $conversionRate, 5);

            
            $r = round($cryptoAmount * $conversionRate, 4);
            // Lets say i give it
            return [
                'equivalentAmount' => $baseAmount,  // Already in USD, so no conversion needed
                'cryptoAmount' => $baseAmount,  
                'conversionRate' => $conversionRate,
                'currentConversion' => $conversionRate,
                'currency' => $currency,
                'amountxvalue' => $cryptoAmount
            ];
        }
        
        
               
        
    }
    $wb = new GetBalance($conn);
?>