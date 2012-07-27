<?php
class PSI_set_case_account {
    /**
     * For all Cases being saved, check for presence of Contact, and set Account accordingly
     *
     * @param $bean aCase Case object
     * @param $event string e.g. 'before_save'
     * @param $args array of arguments, not used
     */
    function PSI_set_case_account($bean,$event,$args){
        $GLOBALS['log']->debug("PSI_set_case_account invoked for a Case object");
        if($event == 'after_relationship_add'){
            $GLOBALS['log']->debug("PSI_set_case_account ... we're in after_relationship_add");
            unset($bean);
            $bean = new aCase();
            $bean->retrieve($args['id']);
        } else {
            $GLOBALS['log']->debug("PSI_set_case_account ... we're in before_save");
        }

        $GLOBALS['log']->debug("PSI_set_case_account object id is {$bean->id}");

        $bean->load_relationship('contacts');
        $contacts = $bean->contacts->getBeans();

        if(empty($bean->account_id) && !empty($contacts)){
            $GLOBALS['log']->debug("PSI_set_case_account ... No current Account but we found 1+ Contacts. Will attempt relate");
            foreach($contacts as $contact){
                if(isset($contact->account_id) && !empty($contact->account_id)){
                    $bean->account_id = $contact->account_id;
                    $GLOBALS['log']->debug("PSI_set_case_account ... Relating Case to Account {$contact->account_id}");
                    if($event == 'after_relationship_add'){
                        $bean->save();
                        $GLOBALS['log']->debug("PSI_set_case_account ... Re-saved Cases record (because were were in after_relationship_add, not before_save) ");
                    }
                } else {
                    $GLOBALS['log']->debug("PSI_set_case_account ... The found contact had no related account");
                }
            }
        } else {
            $GLOBALS['log']->debug("PSI_set_case_account ... There was already an Account else there were no Contacts");
        }
    }
}
