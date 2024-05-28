<?php
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SupprimerDoublonsUtilisateursCompteBancaireCommand extends Command
{
    protected $signature = 'db:supprimer-doublons-compte-bancaire';

    protected $description = 'Supprime les doublons des utilisateurs dans la table compte_bancaire';

    public function handle()
    {
        try {
            // Supprimer les doublons des utilisateurs dans la table compte_bancaire
            DB::table('compte_bancaire')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('compte_bancaire as cb')
                        ->whereRaw('cb.users_id = compte_bancaire.users_id')
                        ->groupBy('cb.users_id')
                        ->havingRaw('COUNT(*) > 1');
                })
                ->whereRaw('ROWID NOT IN (SELECT MIN(ROWID) FROM compte_bancaire GROUP BY users_id)')
                ->delete();

            $this->info('Doublons des utilisateurs dans la table compte_bancaire supprimés avec succès.');
        } catch (\Exception $e) {
            $this->error('Une erreur s\'est produite lors de la suppression des doublons des utilisateurs dans la table compte_bancaire.');
            $this->error($e->getMessage());
        }
    }
}

