import { mapState, mapGetters, mapActions } from 'vuex'

export const authComputed = {
    ...mapState('auth', {
        currentUser: state => state.currentUser,
    }),
    ...mapGetters('auth', ['loggedIn', 'getCurrentUser']),
};

export const authMethods = mapActions('auth', [
    'logIn',
    'logOut',
    'signUp',
    'updateData',
]);

/* Contact */
export const contactComputed = {
    ...mapGetters('contact', ['getContact']),
    ...mapState('contact', ['contact']),
};

export const contactMethods = mapActions('contact', ['sendContact',]);
/* Feedbacks */
export const feedbackComputed = {
    ...mapGetters('feedback', ['getFeedbacks']),
    ...mapState('feedback', ['feedbacks']),
};

export const feedbackMethods = mapActions('feedback', [
    'fetchFeedbacks',
]);
