const routes = [
    {
      path: '/reset-password',
      name: 'reset-password',
      component: ForgotPassword,
      meta: {
        auth:false
      }
    },
    {
      path: '/reset-password/:token',
      name: 'reset-password-form',
      component: ResetPasswordForm,
      meta: {
        auth:false
      }
    }

  ]
