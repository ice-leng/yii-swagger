<?php
/**
 *
 *
 * @SWG\Definition(
 *     definition="ErrorDefault",
 *      @SWG\Property(
 *         description = "请求表单验证错误",
 *         property="form-validate-error",
 *         ref="#/definitions/FormError"
 *     ),
 *     @SWG\Property(
 *          description = "签名错误",
 *          property="sign-error",
 *          ref="#/definitions/SignError"
 *     ),
 *     @SWG\Property(
 *          description = "无效token",
 *          property="token-invalid",
 *          ref="#/definitions/TokenInvalid"
 *     ),
 *     @SWG\Property(
 *          description = "token已到期",
 *          property="token-expires",
 *          ref="#/definitions/TokenExpires"
 *     ),
 *     @SWG\Property(
 *          description = "当前账号在其他地方登录",
 *          property="token-offline",
 *          ref="#/definitions/TokenOffline"
 *     ),
 *
 *     @SWG\Property(
 *          description = "请求参数错误",
 *          property="params-error",
 *          ref="#/definitions/ParamsError"
 *     ),
 *
 *     @SWG\Property(
 *         description = "页面没有找到, 请求错误，没有权限访问",
 *         property="request-error",
 *         ref="#/definitions/RequestError"
 *     ),
 *     @SWG\Property(
 *         description = "服务器内部错误",
 *         property="exception-error",
 *         ref="#/definitions/ExceptionError"
 *     )
 *
 * )
 *
 * @SWG\Definition(
 *      definition="FormError",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=8
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="object",
 *          example={"username": "名称不存在"}
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="SignError",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=9
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="签名错误"
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="TokenInvalid",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=10
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="无效token"
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="TokenExpires",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=11
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="token已到期"
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="TokenOffline",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=12
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="当前账号在其他地方登录"
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="ParamsError",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=400
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="id不存在"
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="RequestError",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=404
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="页面没有找到"
 *      )
 * )
 *
 *
 * @SWG\Definition(
 *      definition="ExceptionError",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=500
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="服务器内部错误"
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="SuccessDefault",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=0
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="success"
 *      ),
 *      @SWG\Property(
 *          property="data",
 *          type="object",
 *          example={}
 *      )
 * )
 *
 * @SWG\Definition(
 *      definition="String",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=0
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="success"
 *      ),
 *      @SWG\Property(
 *          property="data",
 *          type="string",
 *          example=""
 *      )
 * )
 *
 *
 * @SWG\Definition(
 *      definition="Integer",
 *      @SWG\Property(
 *          property="code",
 *          type="integer",
 *          format="int32",
 *          example=0
 *      ),
 *      @SWG\Property(
 *          property="message",
 *          type="string",
 *          example="success"
 *      ),
 *      @SWG\Property(
 *          property="data",
 *          type="integer",
 *          example= 1
 *      )
 * )
 *
 */