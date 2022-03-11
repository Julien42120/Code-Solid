<?php
/*
### EXPLICATIONS ####
- Dans l'exemple ci-dessous, nous pouvons identifier que la classe "Vente" qui ne devrait
travailler qu'avec les montants de vente, calcule également le solde du compte du client.
- C'est MAUVAIS, car le calcul du solde concerne le compte et sa comptabilité doit rester
dans la classe "Compte" ou dans un service chargé du calcul du solde. Comme mis en œuvre ci-dessous,
la classe aurait "deux raisons" de changer:
    1) Les règles de vente ont-elles changé ou
    2) Il y a eu un changement dans le calcul du solde du compte.
Cela va à l'encontre du principe du "principe de responsabilité unique" qui stipule que:
    "Une classe ne doit avoir qu'une seule raison de changer."
*/

class NoBalanceAvailableException extends \Exception
{
}


class Customer
{
    public function getAccount()
    {
        echo "je suis le compte client";
    }
}

class Account extends Customer
{
    public function getBalance()
    {
        echo "200";
    }
    public function setBalance()
    {
    }
    public function calculateBalance(Customer $customer)
    {
        $customer->getAccount()->setBalance($customer->getAccount()->getBalance() - $this->getValue());
    }
    public function haveBalanceAvailable(Customer $customer, $value)
    {
        return $customer->getAccount()->getBalance() >= $value;
    }
}

class Product
{
    public function getValue()
    {
        echo "10";
    }
}

class Sale extends Product
{
    protected $value = "";

    public function getValue()
    {
        $this->value;
    }

    public function setValue($value)
    {
        $value = $this->value;
    }

    public function sell(array $products, Customer $customer)
    {
        $value = $this->calculateTotalValue($products);

        if (!$this->haveBalanceAvailable($customer, $value)) {
            throw new NoBalanceAvailableException();
        }

        /*..... something.....*/

        $this->setValue($value);
        $this->calculateBalance($customer);
    }

    private function calculateTotalValue(array $products)
    {
        $value = 0;

        foreach ($products as $product) {
            $value += $product->getValue();
        }
        return $value;
    }
}
