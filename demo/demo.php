<?php
/**
 * --- .demo start ---
 * @SWG\Get(
 *    path="/demo",
 *    tags={"demo"},
 *    summary="测试",
 *    description="测试",
 *    consumes={"application/x-www-form-urlencoded"},
 *    produces={"application/json", "application/xml"},
 *    security={{"api_key":{}}},
 *    
 *    @SWG\Response(
 *        response = "200",
 *        description = "success",
 *        @SWG\Schema(ref="#/definitions/DemoListSuccess")
 *    ),
 *    
 *    @SWG\Response(
 *        response = "default",
 *        description = "请求失败， http status 强行转为200, 通过code判断",
 *        @SWG\Schema(ref="#/definitions/ErrorDefault")
 *    )
 * )
 *
 * @SWG\Definition(
 *    definition = "DemoListSuccess",
 *                
 *    @SWG\Property(
 *        property = "code",
 *        description = "code",
 *        example = 0,
 *        type = "integer"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "message",
 *        description = "提示",
 *        example = "success",
 *        type = "string"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "data",
 *        description = "返回数据",
 *        type = "object",
 *        ref="#/definitions/DemoList"
 *    )
 * ),
 *
 * @SWG\Definition(
 *    definition = "DemoList",
 *                
 *    @SWG\Property(
 *        property = "list",
 *        description = "列表",
 *        type = "object",
 *        ref="#/definitions/DemoInfo"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "currentPage",
 *        description = "当前分页",
 *        example = "1",
 *        type = "integer"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "pageSize",
 *        description = "分页大小",
 *        example = "10",
 *        type = "integer"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "totalPage",
 *        description = "总分页",
 *        example = "2",
 *        type = "integer"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "totalCount",
 *        description = "总条数",
 *        example = "11",
 *        type = "integer"
 *    )
 * ),
 *
 * @SWG\Definition(
 *    definition = "DemoInfo",
 *                
 *    @SWG\Property(
 *        property = "a1",
 *        description = "1",
 *        example = "12",
 *        type = "string"
 *    ),
 *                
 *    @SWG\Property(
 *        property = "1a",
 *        description = "1",
 *        example = "123",
 *        type = "string"
 *    )
 * )
 * --- .demo end ---
 */